<?php

/**
 * @todo: better defaults required
 * @todo: a lot of more options can be going to be separate methods for init
 *
 * see full example at:
 * http://tinymce.moxiecode.com/tryit/full.php
 */
class TinyMce_HeadHelper extends App_ViewHelper_Abstract
{
    /**
     * default plugins
     */

    protected $_arrPlugins = array(
        'table' => 'table',
        'style' => 'style',
        'autolink' => 'autolink',
        'lists' => 'lists',
        'media' => 'media',
        'paste' => 'paste',
    );

    protected $_arrToolBars = array(
        1 => 'newdocument,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,fontselect,fontsizeselect,formatselect,|,removeformat,|,sub,sup,|,charmap',
        2 => 'cut,copy,paste,pasteword,pastetext,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,|,code,preview,|,forecolor,backcolor,|,tablecontrols',
        3 => '',
        4 => '' );

    protected $_arrThemeOptions = array(
        'theme_advanced_toolbar_location'   => 'theme_advanced_toolbar_location : "top"',
        'theme_advanced_toolbar_align'      => 'theme_advanced_toolbar_align : "left"',
        'theme_advanced_statusbar_location' => 'theme_advanced_statusbar_location : "bottom"',
        'theme_advanced_resizing'           => 'theme_advanced_resizing : false',
    );

    /**
     * @return array
     */
    public function getPlugins()
    {
        return $this->_arrPlugins;
    }

    /**
     * @return TinyMce_HeadHelper
     */
    public function reset()
    {
        $this->_arrPlugins = array();
        $this->_arrToolBars = array();
        $this->_arrThemeOptions = array();
        return $this;
    }

    /**
     * @param string|array $plugins
     * @return TinyMce_HeadHelper
     */
    public function addPlugin( $plugins )
    {
        if ( is_array( $plugins ) ) {
            foreach ( $plugins as $strPlugin ) {
               $this->_arrPlugins[ $strPlugin ]  = $strPlugin;
            }
        } else {
            $strPlugin = $plugins;
            $this->_arrPlugins[ $strPlugin ] = $strPlugin;
        }
        return $this;
    }


    /**
     *
     * @param int $nRow
     * @param string $strToolBar
     * @return TinyMce_HeadHelper
     */
    public function setToolBar( $nRow, $strToolBar )
    {
        $this->_arrToolBars[ $nRow ] = $strToolBar;
        return $this;
    }

    /**
     *
     * @param string $strKey
     * @param string $strValue
     * @return TinyMce_HeadHelper
     */
    public function setThemeOption( $strKey, $strValue )
    {
        $this->_arrThemeOptions[ $strKey ] = $strKey .' : "'.$strValue.'" ';
        return $this;
    }


    public function setContentCss( $strCssPath )
    {
        $this->setThemeOption( 'content_css', $strCssPath );
        return $this;
    }

    /**
     * adds usage of Javascript library
     * @return TinyMce_HeadHelper
     */
    public function Head()
    {
	$this->getView()->broker()->headScript()->append(
            $this->getView()->staticpath() . 'tinymce/tiny_mce.js' );
        return $this;
    }

    /**
     * adds Initialization Javascript to the Head
     * @return void
     */
    public function Init()
    {
        $strTheme = 'advanced';
        $arrThemeOptions = array(
            'plugins'       => 'plugins: "'.implode( ',', $this->getPlugins() ).'"',
            'relative_urls' => 'relative_urls: false',
            'document_base_url' => 'document_base_url: "/" ',
        );
        foreach ( $this->_arrToolBars as $nRow => $strValue )
        {
            $arrThemeOptions [ 'theme_advanced_buttons'. $nRow] = 
                    'theme_advanced_buttons'. $nRow.' : "'.$strValue.'" ';
        }
        foreach ( $this->_arrThemeOptions as $strKey => $strValue )
        {
            $arrThemeOptions[ $strKey ] = $this->_arrThemeOptions[ $strKey ];
        }
        
        $this->getView()->broker()->headScript()->appendScript(
            'tinyMCE.init({ mode : "textareas", theme : "'.$strTheme.'",'
             . implode( ",\n", $arrThemeOptions ) . '}); '
        );
    }
}