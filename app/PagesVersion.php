<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 28/01/2018
 * Time: 00:21
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class PagesVersion extends Model
{
    protected $table = "pages_version";

    protected $fillable = [
        'page_id', 'name', 'content', 'version', 'active', 'updater_user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'updater_user_id');
    }

    public function page()
    {
        return $this->belongsTo('App\Pages', 'page_id');
    }

    public function ParseContent()
    {
        $matchArray = array(
            'link'          => '([[]{2}(.*?)[]]{2})',
            'bold'          => '([\']{2}(.*?)[\']{2})',
            'italic'        => '([\']{3}(.*?)[\']{3})',
            'bolditalic'    => '([\']{5}(.*?)[\']{5})',
            'heading1'      => '(([=]{2})(.*?)([=]{2}))',
            'heading2'      => '(([=]{3})(.*?)([=]{3}))',
            'heading3'      => '(([=]{4})(.*?)([=]{4}))',
            'heading4'      => '(([=]{5})(.*?)([=]{5}))',
            'heading5'      => '(([=]{6})(.*?)([=]{6}))',
        );
        $replaceArray = array(
            'link'          => array('open' => "<a href='{{LINK}}'>", 'close' => '</a>'),
            'bold'          => array('open' => "<strong>", 'close' => '</strong>'),
            'italic'        => array('open' => "<em>", 'close' => '</em>'),
            'bolditalic'    => array('open' => "<strong><em>", 'close' => '</em></strong>'),
            'heading1'      => array('open' => "<h1>", 'close' => '</h1>'),
            'heading2'      => array('open' => "<h2>", 'close' => '</h2>'),
            'heading3'      => array('open' => "<h3>", 'close' => '</h3>'),
            'heading4'      => array('open' => "<h4>", 'close' => '</h4>'),
            'heading5'      => array('open' => "<h5>", 'close' => '</h5>'),
        );

        $content = $this->content;

        foreach($matchArray as $key => $value)
        {
            while (preg_match_all($value, $content, $matches))
            {
                foreach ($matches[0] as  $matchKey => $matchValue)
                {
                    $innertext = $matches[1][$matchKey];
                    $frontTag = ($key == 'link') ? str_replace('{{LINK}}',Route('showWikiPage', $innertext),$replaceArray[$key]['open']) : $replaceArray[$key]['open'];

                    $replacement =
                        $frontTag .
                        trim($innertext) .
                        $replaceArray[$key]['close'];
                    $content = str_replace($matchValue, $replacement, $content);
                }
            }
        }

        return $content;


        /*
        if($GLOBALS['SHORTPAGES'] == 1) $replacementhref = '<a href=\'index.php?page=';
        else $replacementhref = '<a href=\'';
        $listtags = array("code"); //simplified later
        while (preg_match_all('`\[code\](.*?)\[/code\]`', $content, $matches)) {
            foreach ($matches[0] as $key => $match) {
                $innertext = $matches[1][$key];
                $replacement = '<code>' . trim($innertext) . '</code>';
                $content = str_replace($match, $replacement, $content);
            }
        }

        while (preg_match_all('`(?<!\<code>((?!\</code\>)))([[]{2}(.*?)[]]{2})`', $content, $matches)) {
            foreach ($matches[0] as $key => $match) {
                $innertext = $matches[3][$key];
                $replacement = $replacementhref . str_replace(' ', '_', trim(strip_tags($innertext))) . '\'>' . str_replace('_', ' ', trim($innertext)) . '</a>';
                $content = str_replace($match, $replacement, $content);
            }
        }
        return $content;*/
    }

    public function convertContent()
    {
        $this->content;
    }

    public function convertSpaces($str)
    {
        return str_replace('_', ' ', $str);
    }

}