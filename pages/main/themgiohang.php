<?php
session_start();
include('../../admincp/config/config.php');
//them so luong

if (isset($_GET['cong'])) {
  $id = $_GET['cong'];
  $sql = "SELECT soluong FROM tbl_sanpham WHERE id_sanpham = $id";
  $result = mysqli_query($mysqli, $sql);
  foreach ($_SESSION['cart'] as $cart_item) {
    if ($cart_item['id'] != $id) {
      $product[] = array(
        'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
        'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
      );
      $_SESSION['cart'] = $product;
    } else {
      $row = mysqli_fetch_assoc($result);
      $soLuongSanPham = $row['soluong'];
      $tangsoluong = $cart_item['soluong'] + 1;
      if ($tangsoluong <= $soLuongSanPham && $cart_item['soluong'] < 99) {
        $product[] = array(
          'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong, 'giasp' => $cart_item['giasp'],
          'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
        );
      } else {
        $product[] = array(
          'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
          'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
        );
      }
      $_SESSION['cart'] = $product;
    }
  }
  header('Location:../../index.php?quanly=giohang');
}
///tru so luong
if (isset($_GET['tru'])) {
  $id = $_GET['tru'];
  foreach ($_SESSION['cart'] as $cart_item) {
    if ($cart_item['id'] != $id) {
      $product[] = array(
        'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
        'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
      );
      $_SESSION['cart'] = $product;
    } else {
      $tangsoluong = $cart_item['soluong'] - 1;
      if ($cart_item['soluong'] > 1) {
        $product[] = array(
          'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong, 'giasp' => $cart_item['giasp'],
          'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
        );
      } else {
        $product[] = array(
          'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
          'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
        );
      }
      $_SESSION['cart'] = $product;
    }
  }

  header('Location:../../index.php?quanly=giohang');
}
//xoa sam pham
if (isset($_GET['xoa']) && isset($_SESSION['cart'])) {
  $id = $_GET['xoa'];
  foreach ($_SESSION['cart'] as $cart_item) {
    if ($cart_item['id'] != $id) {
      $product[] = array(
        'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
        'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
      );
    }
    $_SESSION['cart'] = $product;
    header('Location:../../index.php?quanly=giohang');
  }
}
//xoa tat ca san pham,
if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
  unset($_SESSION['cart']); // xoa 1 session dc chi dinh
  header('Location:../../index.php?quanly=giohang');
}
//them vao gio hang
if (isset($_POST['themgiohang'])) {
  $id = $_GET['idsanpham'];
  $soluong = 1;
  $spl =  "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "'LIMIT 1";
  $query = mysqli_query($mysqli, $spl);
  $row = mysqli_fetch_array($query);

  if ($row) {
    $new_product = array(array(
      'tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong, 'giasp' => $row['giasp'],
      'hinhanh' => $row['hinhanh'], 'masp' => $row['masp']
    ));
    //kiem tra gio hang ton tai
    if (isset($_SESSION['cart'])) {
      $found = false;
      foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] == $id) {

          $soLuongSanPham = $row['soluong'];
          $tangsoluong = $cart_item['soluong'] + 1;
          if ($tangsoluong <= $soLuongSanPham && $cart_item['soluong'] < 99) {
            //neu du lieu trung
            $product[] = array(
              'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong, 'giasp' => $cart_item['giasp'],
              'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
            );
            $found = true;
          } else {
            $product[] = array(
              'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
              'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
            );
            $found = true;
          }
        } else {
          $product[] = array(
            'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
            'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
          );
        }
      }
      if ($found == false) {
        //lien ket du lieu new_product voi product
        $_SESSION['cart'] = array_merge($product, $new_product);
      } else {
        $_SESSION['cart'] = $product;
      }
    } else {
      $_SESSION['cart'] = $new_product;
    }
  }

  header('Location:../../index.php?quanly=sanpham&id=' . $id . '');
}
//them vao gio hang
if (isset($_POST['mua'])) {
  $id = $_GET['idsanpham'];
  $soluong = 1;
  $spl =  "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "'LIMIT 1";
  $query = mysqli_query($mysqli, $spl);
  $row = mysqli_fetch_array($query);
  if ($row) {
    $new_product = array(array(
      'tensanpham' => $row['tensanpham'], 'id' => $id, 'soluong' => $soluong, 'giasp' => $row['giasp'],
      'hinhanh' => $row['hinhanh'], 'masp' => $row['masp']
    ));
    //kiem tra gio hang ton tai
    if (isset($_SESSION['cart'])) {
      $found = false;
      foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] == $id) {
          $soLuongSanPham = $row['soluong'];
          $tangsoluong = $cart_item['soluong'] + 1;
          if ($tangsoluong <= $soLuongSanPham && $cart_item['soluong'] < 99) {
            //neu du lieu trung
            $product[] = array(
              'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $tangsoluong, 'giasp' => $cart_item['giasp'],
              'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
            );

            $found = true;
          } else {
            $product[] = array(
              'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
              'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
            );
            $found = true;
          }
        } else {
          $product[] = array(
            'tensanpham' => $cart_item['tensanpham'], 'id' => $cart_item['id'], 'soluong' => $cart_item['soluong'], 'giasp' => $cart_item['giasp'],
            'hinhanh' => $cart_item['hinhanh'], 'masp' => $cart_item['masp']
          );
        }
      }
      if ($found == false) {
        //lien ket du lieu new_product voi product
        $_SESSION['cart'] = array_merge($product, $new_product);
      } else {
        $_SESSION['cart'] = $product;
      }
    } else {
      $_SESSION['cart'] = $new_product;
    }
  }

  header('Location:../../index.php?quanly=giohang');
}
