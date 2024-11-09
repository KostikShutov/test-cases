<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\CreditCalculator;
use InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @see \Tests\Functional\CreditPageCest
 */
class CreditPageAction extends AbstractController
{
    public function __construct(
        private CreditCalculator $creditCalculator,
    ) {
    }

    #[Route('/credit', name: 'credit_page')]
    public function __invoke(Request $request): Response
    {
        $amount = $request->query->get('amount');
        $periodInMonths = $request->query->get('periodInMonths');

        if ($amount !== null && $periodInMonths !== null) {
            try {
                $averagePayment = (int)$this->creditCalculator->calculateAveragePayment(
                    amount: (float)$amount,
                    periodInMonths: (int)$periodInMonths,
                );
            } catch (InvalidArgumentException) {
                return new Response(
                    content: 'Error',
                    status: Response::HTTP_BAD_REQUEST,
                );
            }
        }

        return $this->render('credit.html.twig', [
            'amount' => $amount,
            'periodInMonths' => $periodInMonths,
            'averagePayment' => $averagePayment ?? null,
        ]);
    }
}
