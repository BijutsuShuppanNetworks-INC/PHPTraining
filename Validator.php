<PHP
/**
 * ���̓`�F�b�N�������܂Ƃ߂��N���X
 * 
 * 
 * PHP version 5
 * 
 * 
 * @category  php5
 * @package   BNW_PHPTraining
 * @author    Kenichi Suzuki <k-suzuki@bijutsu.co.jp>
 * @copyright BIJUTSU SHUPPAN NETWORKS CO., LTD.
 * @license   BIJUTSU SHUPPAN NETWORKS CO., LTD.
 * @version   0.1
 */

class Validator
{

    /**
     *  ���͔���(���蕶����̗L������)
     *
     * @access public
     * @param  $value �`�F�b�N������
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
     *  �S�p���������ł��邱�Ƃ𔻒�
     *
     * @access public
     * @param  $value �`�F�b�N������
     * @return boolean
     */
    public function _stringIsZenkaku($value)
    {
        if (!$value) {
            return true;    //���͂��Ȃ����OK�Ŗ߂�
        }
        //magic_quotes_gpc��ON�̎��́A�G�X�P�[�v����������
        if (get_magic_quotes_gpc()) {
            $value = stripslashes($value);
        }
        return $value == mb_convert_kana($value, 'RNASKHV');
    }

    /**
     *  ���p���������ł��邱�Ƃ𔻒�
     *
     * @access public
     * @param  $value �`�F�b�N������
     * @return boolean
     */
    public function _stringIsHankaku($value)
    {
        if (!$value) {
            return true;    //���͂��Ȃ����OK�Ŗ߂�
        }
        //magic_quotes_gpc��ON�̎��́A�G�X�P�[�v����������
        if (get_magic_quotes_gpc()) {
            $value = stripslashes($value);
        }
        return $value == mb_convert_kana($value, 'rnaskh');
    }

}