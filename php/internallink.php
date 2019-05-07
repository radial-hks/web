<?php
//require_once('url.php');
//require_once('debug.php');
require_once('httplink.php');
require_once('sql/sqlblog.php');
require_once('sql/sqlmember.php');
require_once('sql/sqlvisitor.php');

define('DEFAULT_NAV_DISPLAY', 100);

// ****************************** Internal none-stock link functions *******************************************************

define('ACCT_PATH', '/account/');

function GetDevGuideLink($strPage, $strVer = false, $bChinese = true)
{
    $str = '/woody/blog/entertainment/'.$strPage;
    $str .= UrlGetPhp($bChinese);
    if ($strVer)	$str .= '#'.$strVer;
    return GetInternalLink($str, $bChinese ? '开发记录' : 'Development Record');
}

function GetBlogLink($strBlogId)
{
    $strBlogUri = SqlGetUriByBlogId($strBlogId);
    if ($strBlogUri)
    {
        return GetInternalLink($strBlogUri, $strBlogUri);
    }
    return '';
}

function GetMemberLink($strMemberId, $bChinese = true)
{
	if ($strEmail = SqlGetEmailById($strMemberId))
	{
	    if (($strName = SqlGetNameByMemberId($strMemberId)) == false)
	    {
	        $strName = $strEmail;
	    }
	    return GetPhpLink(ACCT_PATH.'profile', 'email='.$strEmail, $strName, false, $bChinese);
	}
    return '';
}

define('ACCOUNT_TOOL_EDIT', 'Temporary Test');
define('ACCOUNT_TOOL_PHRASE', 'Common Phrase');
define('ACCOUNT_TOOL_IP', 'IP Address Data');
define('ACCOUNT_TOOL_PRIME', 'Prime Number');

define('ACCOUNT_TOOL_EDIT_CN', '临时测试');
define('ACCOUNT_TOOL_PHRASE_CN', '个人常用短语');
define('ACCOUNT_TOOL_IP_CN', 'IP地址数据');
define('ACCOUNT_TOOL_PRIME_CN', '分解质因数');

function GetAccountToolArray($bChinese)
{
	if ($bChinese)
	{
		$ar = array('editinput' => ACCOUNT_TOOL_EDIT_CN,
                      'commonphrase' => ACCOUNT_TOOL_PHRASE_CN,
                      'ip' => ACCOUNT_TOOL_IP_CN,
                      'primenumber' => ACCOUNT_TOOL_PRIME_CN,
                 );
    }
    else
	{
		$ar = array('editinput' => ACCOUNT_TOOL_EDIT,
                      'commonphrase' => ACCOUNT_TOOL_PHRASE,
					  'ip' => ACCOUNT_TOOL_IP,
                      'primenumber' => ACCOUNT_TOOL_PRIME,
                 );
    }
	return $ar;
}

function GetAccountToolStr($strTitle, $bChinese)
{
    $ar = GetAccountToolArray($bChinese);
	return $ar[$strTitle];
}

function _getAccountToolLink($strTitle, $bChinese)
{
    return GetPhpLink(ACCT_PATH.$strTitle, false, GetAccountToolStr($strTitle, $bChinese), false, $bChinese);
}

function GetCommonPhraseLink($bChinese = true)
{
    return _getAccountToolLink('commonphrase', $bChinese);
}

function _getIpLink($strTitle, $strIp, $bChinese)
{
    return GetPhpLink(ACCT_PATH.$strTitle, 'ip='.$strIp, $strIp, false, $bChinese);
}

function GetIpLink($strIp, $bChinese)
{
    return _getIpLink('ip', $strIp, $bChinese);
}

function GetVisitorLink($strIp, $bChinese = true)
{
    return _getIpLink(VISITOR_TABLE, $strIp, $bChinese);
}

function GetSpiderVisitorLink($strIp, $bChinese)
{
    return _getIpLink(SPIDER_VISITOR_TABLE, $strIp, $bChinese);
}

function GetLoginLink($strCn, $strUs, $bChinese)
{
    return GetPhpLink(ACCT_PATH.'login', false, $strCn, $strUs, $bChinese);
}

function GetAllCommentLink($strQuery, $bChinese)
{
    return GetPhpLink(ACCT_PATH.'comment', $strQuery, '全部评论', 'All Comment', $bChinese);
}

?>
