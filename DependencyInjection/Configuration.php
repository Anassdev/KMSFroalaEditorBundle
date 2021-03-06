<?php

namespace KMS\FroalaEditorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * KMS Froala configuration.
 */
class Configuration implements ConfigurationInterface
{
    
    //-------------------------------------------------------------//
    //--------------------------- METHODS -------------------------//
    //-------------------------------------------------------------//
    
    //-------------------------------------------------------------//
    //--------------------------- OVERRIDE ------------------------//
    //-------------------------------------------------------------//
    
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root( "kms_froala_editor" );
        //------------------------- DECLARE ---------------------------//
        
        $rootNode
            ->children()
            
                // Froala base path.
                ->scalarNode( "basePath" )
                    ->defaultValue( "/bundles/kmsfroalaeditor/" )
                    ->info( "URL path used to load Froala files from." )
                ->end()
                
                // Language.
                ->scalarNode( "language" )
                    ->defaultValue( "en_us" )
                    ->info( "Editor's language." )
                ->end()
                
                // Plugins.
                ->arrayNode( "plugins" )
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode( "blockStyles" )
                            ->defaultTrue()
                            ->info( "Use plugin : Block Style." )
                        ->end()
                        ->booleanNode( "colors" )
                            ->defaultTrue()
                            ->info( "Use plugin : Colors." )
                        ->end()
                        ->booleanNode( "charCounter" )
                            ->defaultTrue()
                            ->info( "Use plugin : Char counter." )
                        ->end()
                        ->booleanNode( "fileUpload" )
                            ->defaultTrue()
                            ->info( "Use plugin : File upload." )
                        ->end()
                        ->booleanNode( "fontFamily" )
                            ->defaultTrue()
                            ->info( "Use plugin : Font family." )
                        ->end()
                        ->booleanNode( "fontSize" )
                            ->defaultTrue()
                            ->info( "Use plugin : Font size." )
                        ->end()
                        ->booleanNode( "lists" )
                            ->defaultTrue()
                            ->info( "Use plugin : Lists." )
                        ->end()
                        ->booleanNode( "mediaManager" )
                            ->defaultTrue()
                            ->info( "Use plugin : Media manager." )
                        ->end()
                        ->booleanNode( "table" )
                            ->defaultTrue()
                            ->info( "Use plugin : Table." )
                        ->end()
                        ->booleanNode( "video" )
                            ->defaultTrue()
                            ->info( "Use plugin : Video." )
                        ->end()
                    ->end()
                ->end()
                
                // Inline mode.
                ->booleanNode( "inlineMode" )
                    ->defaultFalse()
                    ->info( "Enable/disable inline mode." )
                ->end()
                
                // Media manager.
                ->arrayNode( "imageUpload" )
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode( "route" )
                            ->defaultValue( "kms_froala_editor_upload_image" )
                            ->info( "Image upload route." )
                        ->end()
                        ->scalarNode( "routeDelete" )
                            ->defaultValue( "kms_froala_editor_delete_image" )
                            ->info( "Image delete route." )
                        ->end()
                        ->scalarNode( "folder" )
                            ->defaultValue( "/upload" )
                            ->info( "Image upload directory in the web folder ." )
                        ->end()
                    ->end()
                ->end()
                // Media manager.
                ->arrayNode( "mediaManager" )
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode( "route" )
                            ->defaultValue( "kms_froala_editor_load_images" )
                            ->info( "Media manager route." )
                        ->end()
                    ->end()
                ->end()
                // Auto save.
                ->arrayNode( "autosave" )
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode( "active" )
                            ->defaultFalse()
                            ->info( "Enable/disable autosave." )
                        ->end()
                        ->scalarNode( "route" )
                            ->defaultValue( "" )
                            ->info( "Autosave route." )
                        ->end()
                        ->scalarNode( "requestType" )
                            ->defaultValue( "POST" )
                            ->info( "Autosave route." )
                        ->end()
                    ->end()
                ->end()
            ->end();
        
        return $treeBuilder;
    }
}
