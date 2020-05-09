Theme Name:Sableng9
Author : donairl
Description:
Themes with sticky green navbar and support mobile responsive also.


How to use :
1. Copy sableng9 into your themes folder
2. Copy ThemeAsset.php to assets folder
3. Copy sableng9/web/themes/sableng9 into your web folder, become : web/themes/sableng9
   or if u using linux you can symlink
4. Edit your config/web.php
    'components' => [
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/sableng9',
                'baseUrl' => '@web/themes/sableng9',
                'pathMap' => [
                    '@app/views' => '@app/themes/sableng9',
                ],
            ],
        ],

    ....


5.if you want review full page themes,Backup your existing index.php and Copy index.php to view/site/index.php 