<?php
class user
{
    var $MaND;
    var $Ho;
    var $Ten;
    var $GioiTinh;
    var $SDT;
    var $Email;
    var $DiaChi;
    var $MatKhau;
    var $MaQuyen;
    var $TrangThai;

    public function getMaND()
    {
        return $this->MaND;
    }

    public function setMaND($MaND)
    {
        $this->MaND = $MaND;
    }

    public function getHo()
    {
        return $this->Ho;
    }

    public function setHo($Ho)
    {
        $this->Ho = $Ho;
    }

    public function getTen()
    {
        return $this->Ten;
    }

    public function setTen($Ten)
    {
        $this->Ten = $Ten;
    }

    public function getGioiTinh()
    {
        return $this->GioiTinh;
    }

    public function setGioiTinh($GioiTinh)
    {
        $this->GioiTinh = $GioiTinh;
    }

    public function getSDT()
    {
        return $this->SDT;
    }

    public function setSDT($SDT)
    {
        $this->SDT = $SDT;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    public function getDiaChi()
    {
        return $this->DiaChi;
    }

    public function setDiaChi($DiaChi)
    {
        $this->DiaChi = $DiaChi;
    }

    public function getMatKhau()
    {
        return $this->MatKhau;
    }

    public function setMatKhau($MatKhau)
    {
        $this->MatKhau = $MatKhau;
    }

    public function getMaQuyen()
    {
        return $this->MaQuyen;
    }

    public function setMaQuyen($MaQuyen)
    {
        $this->MaQuyen = $MaQuyen;
    }

    public function getTrangThai()
    {
        return $this->TrangThai;
    }

    public function setTrangThai($TrangThai)
    {
        $this->TrangThai = $TrangThai;
    }


    function __construct($MaND, $Ho, $Ten, $GioiTinh, $SDT, $Email, $DiaChi, $MatKhau, $MaQuyen, $TrangThai)
    {
        $this->MaND = $MaND;
        $this->Ho = $Ho;
        $this->Ten = $Ten;
        $this->GioiTinh = $GioiTinh;
        $this->SDT = $SDT;
        $this->Email = $Email;
        $this->DiaChi = $DiaChi;
        $this->MatKhau = $MatKhau;
        $this->MaQuyen = $MaQuyen;
        $this->TrangThai = $TrangThai;
    }

    function isLoginValid($numPhone, $pass)
    {
        if ($numPhone == $this->SDT && $pass == $this->MatKhau)
            return true;
        else
            return false;
    }

    function isAcountValid($numPhone)
    {
        if ($numPhone == $this->SDT)
            return true;
        else
            return false;
    }
}
