<?php 

namespace Chipaau\Api;

use Illuminate\Http\Request;

class ApiVersion {

    const VERSION = 1;

    protected $request;

    protected $version;


    private static $valid_api_versions = [
        1 => 'v1'
    ];



    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->loadVersion();
    }

    /**
     * Resolve the requested api version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return integer
     */
    private function loadVersion() {
        $this->version = $this->request->hasHeader('Api-Version') ? intval($this->request->header('Api-Version')) : self::VERSION;
    }

    /**
     * Determines if a version is valid or not
     *
     * @param integer $apiVersion
     * @return bool
     */
    private static function isValid($apiVersion) {
        return in_array(
            $apiVersion,
            array_keys(self::$valid_api_versions)
        );
    }

    /**
     * Resolve namespace for a api version
     *
     * @param integer $apiVersion
     * @return string
     */
    public function getVersion()
    {
        if (!self::isValid($this->version)) {
            throw new \Exception("Invalid verson number supplied");
            
        }

        return self::$valid_api_versions[$this->version];
    }

}