<?php

namespace BinPacking\Algorithms;

use BinPacking\{RectangleBinPack, Rectangle};
use BinPacking\Helpers\RectangleFactory;
use BinPacking\Helpers\RectangleHelper;

class BestShortSideFit
{
    public static function findNewPosition(
        RectangleBinPack $bin,
        Rectangle $rectangle,
        int &$bestShortSideFit,
        int &$bestLongSideFit
    ) : ?Rectangle {
        $bestNode = null;
        $bestLongSideFit = RectangleHelper::MAXINT;
        $bestShortSideFit = RectangleHelper::MAXINT;

        foreach ($bin->getFreeRectangles() as $freeRect) {
            if ($freeRect->getWidth() >= $rectangle->getWidth() && $freeRect->getHeight() >= $rectangle->getHeight()) {
                $leftoverHoriz = abs($freeRect->getWidth() - $rectangle->getWidth());
                $leftoverVert = abs($freeRect->getHeight() - $rectangle->getHeight());
                $shortSideFit = min($leftoverHoriz, $leftoverVert);
                $longSideFit = max($leftoverHoriz, $leftoverVert);

                if ($shortSideFit < $bestShortSideFit || ($shortSideFit == $bestShortSideFit && $longSideFit < $bestLongSideFit)) {
                    $bestNode = RectangleFactory::fromRectangle($rectangle);
                    $bestNode->setX($freeRect->getX());
                    $bestNode->setY($freeRect->getY());

                    $bestShortSideFit = $shortSideFit;
                    $bestLongSideFit = $longSideFit;
                }
            }

            if ($bin->isFlipAllowed() && $freeRect->getWidth() >= $rectangle->getHeight() && $freeRect->getHeight() >= $rectangle->getWidth()) {
                $leftoverHoriz = abs($freeRect->getWidth() - $rectangle->getHeight());
                $leftoverVert = abs($freeRect->getHeight() - $rectangle->getWidth());
                $shortSideFit = min($leftoverHoriz, $leftoverVert);
                $longSideFit = max($leftoverHoriz, $leftoverVert);

                if ($shortSideFit < $bestShortSideFit || ($shortSideFit == $bestShortSideFit && $longSideFit < $bestLongSideFit)) {
                    $bestNode = RectangleFactory::fromRectangle($rectangle);
                    $bestNode->setX($freeRect->getX());
                    $bestNode->setY($freeRect->getY());
                    $bestNode->rotate();
                             
                    $bestShortSideFit = $shortSideFit;
                    $bestLongSideFit = $longSideFit;
                }
            }
        }

        return $bestNode;
    }
}
