<?php

function getComposerFileData(string $json): array
{
    $arr = [];

    if (!empty($json)) {
        $arr = json_decode($json, true);
    }

    return $arr;
}

$json = '{
    "name":"SoloDB4",
    "description":"SoloDB4 requirements",
    "repositories":[
        {
            "type":"package",
            "package":{
                "name":"guilhermeblanco/ZendFramework1-Doctrine2",
                "version":"master",
                "source":{
                    "url":"git://github.com/guilhermeblanco/ZendFramework1-Doctrine2.git",
                    "type":"git",
                    "reference":"master"
                }
            }
        },
        {
            "type":"package",
            "package":{
                "name":"easybib/EasyBib_Form_Decorator",
                "version":"master",
                "source":{
                    "url":"git://github.com/easybib/EasyBib_Form_Decorator.git",
                    "type":"git",
                    "reference":"master"
                }
            }
        },
        {
            "type":"package",
            "package":{
                "name":"ezyang/htmlpurifier",
                "version":"master",
                "source":{
                    "url":"git://github.com/ezyang/htmlpurifier.git",
                    "type":"git",
                    "reference":"master"
                }
            }
        },
        {
            "type":"package",
            "package":{
                "name":"phpids/phpids",
                "version":"0.7",
                "dist":{
                    "url":"http://phpids.org/files/phpids-0.7.zip",
                    "type":"zip",
                    "reference":"0.7"
                }
            }
        },
        {
            "type":"package",
            "package":{
                "name":"mrclay/minify",
                "version":"master",
                "source":{
                    "url":"git://github.com/mrclay/minify.git",
                    "type":"git",
                    "reference":"master"
                }
            }
        },
        {
            "type":"package",
            "package":{
                "name":"sourceforge/phpthumb",
                "version":"1.7.11",
                "dist":{
                    "url":"http://sourceforge.net/projects/phpthumb/files/phpThumb%28%29/1.7.11/phpThumb-1.7.11-201108081537-beta.zip/download",
                    "type":"zip",
                    "reference":"1.7.11"
                }
            }
        },
        {
            "type":"package",
            "package":{
                "name":"zids/zids",
                "version":"1.0.1",
                "source":{
                    "url":"http://zids.googlecode.com/svn/zids/",
                    "type":"svn",
                    "reference":"1.0.1"
                }
            }
        },
        {
            "type":"package",
            "package":{
                "name":"arnaud-lb/zwig",
                "version":"master",
                "source":{
                    "url":"git://github.com/arnaud-lb/Zwig.git",
                    "type":"git",
                    "reference":"master"
                }
            }
        },
        {
            "type":"package",
            "package":{
                "name":"apache/solr",
                "version":"trunk",
                "source":{
                    "url":"http://solr-php-client.googlecode.com/svn",
                    "type":"svn",
                    "reference":"trunk"
                }
            }
        }


    ],
    "require":{
        "doctrine/migrations":"dev-master",
        "symfony/console":">=2.0.10",
        "symfony/yaml":">=2.0.10",
        "doctrine/common":"2.2.1",
        "doctrine/dbal":"2.2.1",
        "doctrine/orm":"2.2.1",
        "twig/twig":">=1.6.1",
        "gedmo/doctrine-extensions":"2.2.1",
        "simplethings/entity-audit-bundle":"dev-master",
        "guilhermeblanco/ZendFramework1-Doctrine2":"master",
        "easybib/EasyBib_Form_Decorator":"master",
        "ezyang/htmlpurifier":"master",
        "phpids/phpids":"0.7",
        "mrclay/minify":"master",
        "sourceforge/phpthumb":"1.7.11",
        "zids/zids":"1.0.1",
        "arnaud-lb/zwig":"master",
        "apache/solr":"trunk"

    },
    "recommend":{
        "ext-zip":"*"
    },
    "autoload":{
        "psr-0":{
            "SoloDB":"application/module/SoloDB/src/",
            "Admin":"application/module/Admin/src/",
            "Core":"application/module/Core/src/",
            "Equipment":"application/module/Equipment/src/",
            "File":"application/module/File/src/",
            "Flow":"application/module/Flow/src/",
            "Location":"application/module/Location/src/",
            "Module":"application/module/Module/src/"
        }
    },
    "bin":["bin"],
    "config":{
        "vendor-dir":"vendor"
    }

}';

echo '<pre>';
print_r(getComposerFileData($json));
echo '</pre>';