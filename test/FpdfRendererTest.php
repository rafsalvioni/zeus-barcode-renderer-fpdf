<?php

namespace ZeusTest\Barcode\Renderer;

/**
 * Fpdf Renderer Test
 *
 * @author Rafael M. Salvioni
 */
class FpdfRendererTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function renderTest()
    {
        $hashTest = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
        $bc = new \Zeus\Barcode\Upc\Ean13('98763547908', false);
        $renderer = new \Zeus\Barcode\Renderer\FpdfRenderer();
        \ob_start();
        $bc->draw($renderer)->getResource()->Output('S');
        $output = \ob_get_contents();
        $hash = \sha1($output);
        \ob_end_clean();
        $this->assertEquals($hashTest, $hash);
    }
}
