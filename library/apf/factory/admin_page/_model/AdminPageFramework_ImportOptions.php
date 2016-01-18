<?php 
/**
	Admin Page Framework v3.7.12b02 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/admin-page-framework>
	Copyright (c) 2013-2016, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class AdminPageFramework_ImportOptions extends AdminPageFramework_CustomSubmitFields {
    public $aFilesImport = array();
    public function __construct($aFilesImport, $aPostImport) {
        parent::__construct($aPostImport);
        $this->aFilesImport = $aFilesImport;
    }
    private function getElementInFilesArray(array $aFilesImport, $sInputID, $sElementKey = 'error') {
        $sElementKey = strtolower($sElementKey);
        return $this->getElement($aFilesImport, array($sElementKey, $sInputID), null);
    }
    public function getError() {
        return $this->getElementInFilesArray($this->aFilesImport, $this->sInputID, 'error');
    }
    public function getType() {
        return $this->getElementInFilesArray($this->aFilesImport, $this->sInputID, 'type');
    }
    public function getImportData() {
        $sFilePath = $this->getElementInFilesArray($this->aFilesImport, $this->sInputID, 'tmp_name');
        $vData = file_exists($sFilePath) ? file_get_contents($sFilePath, true) : false;
        return $vData;
    }
    public function formatImportData(&$vData, $sFormatType = null) {
        $sFormatType = isset($sFormatType) ? $sFormatType : $this->getFormatType();
        switch (strtolower($sFormatType)) {
            case 'text':
                return;
            case 'json':
                $vData = json_decode(( string )$vData, true);
                return;
            case 'array':
            default:
                $vData = maybe_unserialize(trim($vData));
                return;
        }
    }
    public function getFormatType() {
        $this->sFormatType = isset($this->sFormatType) && $this->sFormatType ? $this->sFormatType : $this->getSubmitValueByType($this->aPost, $this->sInputID, 'format');
        return $this->sFormatType;
    }
}
