<?php 

namespace koolreport\bootstrap5;

trait Theme
{
    protected function __constructBoostrap4Theme()
    {
        $this->theme = new Bootstrap5Theme($this);
    }
}