<?php

namespace App\Controller;

use App\Calculator\CalculatorService;
use App\Calculator\Exception\CalculatorException;
use App\Form\CalculatorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @Route("/calculator", name="calculator")
     */
    public function index(Request $request, CalculatorService $calculatorService): Response
    {
        $form = $this->createForm(CalculatorType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $result = null;

            try {
                $result = $calculatorService->calculate($data['value1'], $data['value2'], $data['operand']);
            } catch (CalculatorException $e) {
                $form->addError(new FormError($e->getMessage()));
            }

            return $this->render('calculator/index.html.twig', [
                'form' => $form->createView(),
                'result' => $result
            ]);
        }

        return $this->render('calculator/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
