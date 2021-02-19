<?php

namespace by\component\aliyun\OSS\Model;

/**
 * Interface XmlConfig
 * @package  by\component\aliyun\OSS\Model
 */
interface XmlConfig
{

    /**
     * Interface method: Parse the object from the xml.
     *
     * @param string $strXml
     * @return null
     */
    public function parseFromXml($strXml);

    /**
     * Interface method: Serialize the object into xml.
     *
     * @return string
     */
    public function serializeToXml();

}
