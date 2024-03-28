<?php

namespace koolreport\bootstrap5;

class Bootstrap5Theme extends \koolreport\core\Theme
{
    public function themeInfo()
    {
        return array(
            "name"=>"Bootstrap 5 Theme",
            "version"=>"5.2.3",
            "base"=>"bs5",
            "cssClass"=>"bs5"
        );
    }
    protected function onInit()
    {
        $report = $this->getReport();
        if($report)
        {
            $report->registerEvent("OnResourceInit",function() use ($report){
                $coreFolderUrl = $report->getResourceManager()->publishAssetFolder(realpath(dirname(__FILE__)."/assets/core5.2"));                
                $jqueryAssetUrl = $report->getResourceManager()->publishAssetFolder(realpath(dirname(__FILE__)."/../core/src/clients/jquery"));
                $resources = array(
                    "js"=>array(
                        $jqueryAssetUrl."/jquery.min.js",
                        array(
                            $coreFolderUrl."/js/bootstrap.bundle.min.js"
                        )
                    ),
                    "css"=>array(
                        $coreFolderUrl."/css/bootstrap.min.css",
                    )
                );
                $report->getResourceManager()->addScriptOnBegin("KoolReport.load.resources(".json_encode($resources).");");
            });    
        }
    }
}