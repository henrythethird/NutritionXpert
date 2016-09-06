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
            $ingredient->setAlcohol($csvData[31]);
            $ingredient->setWater($csvData[36]);
            $ingredient->setCarbs($csvData[41]);
            $ingredient->setStarch($csvData[46]);
            $ingredient->setSugars($csvData[51]);
            $ingredient->setDietaryFibres($csvData[56]);
            $ingredient->setFat($csvData[61]);
            $ingredient->setCholesterol($csvData[66]);
            $ingredient->setFattyAcidsMono($csvData[71]);
            $ingredient->setFattyAcidsSaturated($csvData[76]);
            $ingredient->setFattyAcidsPoly($csvData[81]);
            $ingredient->setVitaminA($csvData[86]);
            $ingredient->setRetinolEquiv($csvData[91]);
            $ingredient->setBetaCaroteneActivity($csvData[96]);
            $ingredient->setBetaCarotene($csvData[101]);
            $ingredient->setVitaminB1($csvData[106]);
            $ingredient->setVitaminB2($csvData[111]);
            $ingredient->setVitaminB6($csvData[116]);
            $ingredient->setVitaminB12($csvData[121]);
            $ingredient->setNiacin($csvData[126]);
            $ingredient->setFolate($csvData[131]);
            $ingredient->setPantothenicAcid($csvData[136]);
            $ingredient->setVitaminC($csvData[141]);
            $ingredient->setVitaminD($csvData[146]);
            $ingredient->setVitaminE($csvData[151]);
            $ingredient->setSodium($csvData[156]);
            $ingredient->setPotassium($csvData[161]);
            $ingredient->setChloride($csvData[166]);
            $ingredient->setCalcium($csvData[171]);
            $ingredient->setMagnesium($csvData[176]);
            $ingredient->setPhosphorous($csvData[181]);
            $ingredient->setIron($csvData[186]);
            $ingredient->setIodine($csvData[191]);
            $ingredient->setZinc($csvData[196]);

            $em->persist($ingredient);
        }
        $em->flush();
    }
}
