<?php

namespace AppBundle\Command;

use AppBundle\Entity\Ingredient;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\File\File;

class ImportNutritionDataCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:import:ingredients')
            ->setDescription('Imports ingredients from the swiss database')
            ->addArgument('file', InputArgument::REQUIRED, 'Path to the file')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()
            ->get('doctrine')
            ->getManager();

        $file = new File($input->getArgument('file'));

        $open = $file->openFile();

        while (!$open->eof()) {
            $line = $open->getCurrentLine();
            $csvData = str_getcsv($line);
            // Header
            if ($csvData[0] === 'ID') {
                dump($csvData);
                continue;
            }

            if (!isset($csvData[1])) continue;

            $ingredient = new Ingredient();
            $ingredient->setName($csvData[3]);
            $ingredient->setCalories($csvData[21]);
            $ingredient->setProtein($csvData[26]);
            $ingredient->setFat($csvData[61]);
            $ingredient->setCarbs($csvData[41]);
            $ingredient->setAlcohol($csvData[31]);

            $em->persist($ingredient);
        }
        $em->flush();
    }
}
