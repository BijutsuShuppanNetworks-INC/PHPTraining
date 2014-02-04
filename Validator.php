<?PHP
/**
 * 入力チェック処理をまとめたクラス
 * 
 * 
 * PHP version 5
 * 
 * 
 * @category  php5
 * @package   BNW_PHPTraining
 * @author    Kenichi Suzuki <k-suzuki@bijutsu.co.jp>
 * @copyright BIJUTSU SHUPPAN NETWORKS CO., LTD.
 * @version   0.1
 */

class Validator
{
    /**
     *  入力判定(判定文字列の有無判定)
     *
     * @access public
     * @param  $value チェック文字列
     * @return boolean
     */
    public function _require($value)
    {
        if (empty($value)) {
            return false;
        }
        return true;
    }

    /**
<<<<<<< HEAD
     *  半角数字だけであることを判定
     *
     * @access public
     * @param  $value チェック文字列
     * @return boolean
     */
    public function _stringIsHankakuSuuji($value)
    {
        if (!$value) {
            return true;    //入力がなければOKで戻す
        }
        //magic_quotes_gpcがONの時は、エスケープを解除する
        if (get_magic_quotes_gpc()) {
            $value = stripslashes($value);
        }
        return is_numeric($value);
    }

    /**
     *  半角英数字だけであることを判定
     *
     * @access public
     * @param  $value チェック文字列
     * @return boolean
     */
    public function _stringIsHankakuAlphaNum($value)
    {
        if (!$value) {
            return true;    //入力がなければOKで戻す
        }
        //magic_quotes_gpcがONの時は、エスケープを解除する
        if (get_magic_quotes_gpc()) {
            $value = stripslashes($value);
        }
        if (!preg_match("/^([a-z]|[0-9])+$/i", $value)) {
            return false;
        }
        return true;
    }

    /**
     *  半角英数字と記号だけであることを判定
     *
     * @param  string $value 入力
     * @return int    boolean
     */
    public function _stringHankakuAlphaNumSign($value)
    {
        if (!$value) {
            return true;    //入力がなければOKで戻す
        }
        //magic_quotes_gpcがONの時は、エスケープを解除する
        if (get_magic_quotes_gpc()) {
            $value = stripslashes($value);
        }
        if (!preg_match("^[a-zA-Z0-9!-/:-@[-`{-~\']+$", $value)) {
            return false;
        }
        return true;
    }

    /**
     *  全角文字だけであることを判定
     *
     * @access public
     * @param  $value チェック文字列
=======
     *  全角文字だけであることを判定
     *
     * @access public
     * @param  $value チェック文字列
>>>>>>> 21822ba9026c9c93992e9e9666b6e9fa639a39e0
     * @return boolean
     */
    public function _stringIsZenkaku($value)
    {
        if (!$value) {
            return true;    //入力がなければOKで戻す
        }
        //magic_quotes_gpcがONの時は、エスケープを解除する
        if (get_magic_quotes_gpc()) {
            $value = stripslashes($value);
        }
        return $value == mb_convert_kana($value, 'RNASKHV');
    }

    /**
     *  半角文字だけであることを判定
     *
     * @access public
     * @param  $value チェック文字列
     * @return boolean
     */
    public function _stringIsHankaku($value)
    {
        if (!$value) {
            return true;    //入力がなければOKで戻す
        }
        //magic_quotes_gpcがONの時は、エスケープを解除する
        if (get_magic_quotes_gpc()) {
            $value = stripslashes($value);
        }
        return $value == mb_convert_kana($value, 'rnaskh');
    }
}