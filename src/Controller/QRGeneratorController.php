<?php


namespace App\Controller;

use App\Entity\VCard;
use App\Form\VCardFormType;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Builder\BuilderInterface;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCodeBundle\Response\QrCodeResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class QRGeneratorController extends AbstractController
{
    /**
     * @Route("/", name="qr_generator_vcard")
     */
    public function vCard(BuilderInterface $customQrCodeBuilder, Request $request)
    {
        $VCard = new VCard();

        $VCardForm = $this->createForm(VCardFormType::class, $VCard);


        if ($request->isXmlHttpRequest()) {
            $VCardForm->handleRequest($request);
            if ($VCardForm->isSubmitted() && $VCardForm->isValid()) {
                $VCard = $VCardForm->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($VCard);
                $entityManager->flush();


                $VCardData = "BEGIN:VCARD\nVERSION:3.0\n";
                $VCardData .= "N:{$VCardForm['first_name']->getData()};{$VCardForm['last_name']->getData()}\n";
                $VCardData .= "FN:{$VCardForm['first_name']->getData()} {$VCardForm['last_name']->getData()}\n";
                $VCardData .= "TEL:{$VCardForm['tel']->getData()}\n";
                $VCardData .= "EMAIL:{$VCardForm['email']->getData()}\n";
                $VCardData .= "ORG:{$VCardForm['org']->getData()}\n";
                $VCardData .= "TITLE:{$VCardForm['title']->getData()}\n";
                $VCardData .= "ADR;type=WORK:;;{$VCardForm['streetHouseNumber']->getData()};{$VCardForm['city']->getData()};{$VCardForm['region']->getData()};{$VCardForm['postcode']->getData()};{$VCardForm['country']->getData()}\n";
                $VCardData .= "URL:{$VCardForm['url']->getData()}\n";
                $VCardData .= "NOTE:{$VCardForm['note']->getData()}\n";
                if (!empty($VCardForm['bday']->getData())) {
                    $VCardData .= "BDAY:" . date_format($VCardForm['bday']->getData(), 'Y-m-d')."\n";
                }
                $VCardData .= "END:VCARD";


                $bgColor = $this->hexToRGB($VCardForm['color_bg']->getData());
                $qrColor = $this->hexToRGB($VCardForm['color_qr']->getData());
                $qrSize = $VCardForm['size']->getData();

                $result = $customQrCodeBuilder
                    ->size($qrSize * 35)
                    ->backgroundColor(new Color($bgColor['red'], $bgColor['green'], $bgColor['blue']))
                    ->foregroundColor(new Color($qrColor['red'], $qrColor['green'], $qrColor['blue']))
                    ->data($VCardData)
                    ->build();


                return new JsonResponse(['qr' => $result->getDataUri()], 200);
            }
        }


        return $this->render('base.html.twig', [
            'form' => $VCardForm->createView(),
        ]);
    }

    private function hexToRGB($colour)
    {
        if ($colour[0] == '#') {
            $colour = substr($colour, 1);
        }
        if (strlen($colour) == 6) {
            list($r, $g, $b) = array($colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5]);
        } elseif (strlen($colour) == 3) {
            list($r, $g, $b) = array($colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2]);
        } else {
            return false;
        }
        $r = hexdec($r);
        $g = hexdec($g);
        $b = hexdec($b);
        return array('red' => $r, 'green' => $g, 'blue' => $b);
    }
}