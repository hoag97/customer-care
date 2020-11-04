<?php

    include_once("../../Config/myConfig.php");

    class Customer_m extends Connect {

        function __construct()
        {
            parent::__construct();
        }
        //Hiện danh sách khách hàng
        protected function getCustomer () {

            $sql = "SELECT *FROM tbl_customer, tbl_showroom 
                    WHERE tbl_customer.showroom_id = tbl_showroom.showroom_id
                    ORDER BY tbl_customer.create_at DESC";

            $pre = $this->pdo->prepare($sql);

            $pre->execute();

            $result = array();

            while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {

                $result[] = $row;

            }

            return $result;

        }

        //Thêm khách hàng vào bảng tbl_customer
        protected function addCustomer($name,$showroom_id, $phone, $email){
            $sql = "INSERT INTO tbl_customer (name,showroom_id, phone, email) VALUES (:name, :showroom_id, :phone, :email)";
            $pre = $this->pdo->prepare($sql);

            $pre->bindParam(':name', $name);
            $pre->bindParam(':showroom_id', $showroom_id);
            $pre->bindParam(':phone', $phone);
            $pre->bindParam(':email', $email);

            return $pre->execute();

        }

        //Hàm kiểm tra xem khách hàng đã có trong danh sách hay chưa theo email và sđt
        function checkEmailPhone($phone, $email){
            $sql = "SELECT *FROM tbl_customer WHERE phone = :phone OR email = :email";
            $pre = $this->pdo->prepare($sql);

            $pre->bindParam(':phone', $phone);
            $pre->bindParam(':email', $email);

            $pre->execute();

            $result = array();

            while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {

                $result[] = $row;

            }

            return $result;
        }

        //Xóa khách hàng trong bảng tbl_customer
        protected function removeCustomer ($id) {

            $sql = "DELETE FROM tbl_customer WHERE id = :id";

            $pre = $this->pdo->prepare($sql);

            $pre->bindParam(":id", $id);

            return $pre->execute();

        }

        //Tìm kiếm khách hàng trong bảng tbl_customer
        protected function searchCustomer ($key) {

            $sql = "SELECT * FROM tbl_customer, tbl_showroom
                    WHERE tbl_customer.showroom_id = tbl_showroom.showroom_id
                    AND CONCAT(name, title, email, phone) LIKE :key";

            $pre = $this->pdo->prepare($sql);

            $pre->bindValue(':key', '%'.$key.'%');

            $pre->execute();

            $result = array();

            while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {

                $result[] = $row;

            }

            return $result;

        }

        //Chỉnh sửa thông tin khách hàng
        protected function editCustomer($id, $name, $phone, $email){

            $sql = "UPDATE tbl_customer 
                    SET 
                        name = :name, phone = :phone, email = :email
                    WHERE id = :id";

            $pre = $this->pdo->prepare($sql);

            $pre->bindParam(':id', $id);

            $pre->bindParam(':name', $name);

            $pre->bindParam(':phone', $phone);

            $pre->bindParam(':email', $email);

            return $pre->execute();
        }

        
    }
