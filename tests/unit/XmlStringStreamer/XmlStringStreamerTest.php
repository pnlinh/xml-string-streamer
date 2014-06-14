<?php

use Prewk\XmlStringStreamer;

class XmlStringStreamerTest extends PHPUnit_Framework_TestCase
{
    public function test_getNode()
    {
        $node = "<node><a>lorem</a><b>ipsum</b></node>";

        $parser = Mockery::mock("\\Prewk\\XmlStringStreamer\\ParserInterface");
        $parser->shouldReceive("getNodeFrom")
               ->with(Mockery::type("\\Prewk\\XmlStringStreamer\\StreamInterface"))
               ->once()
               ->andReturn($node);

        $stream = Mockery::mock("\\Prewk\\XmlStringStreamer\\StreamInterface");

        $streamer = new XmlStringStreamer($parser, $stream);
        
        $this->assertEquals($streamer->getNode(), $node, "Node received from the parser should be what was expected");
    }
}