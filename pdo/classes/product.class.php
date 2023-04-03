<?php 

    class Product extends Db {
        public function getProducts() {
            $sql = "SELECT * FROM products";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function getProductById(int $productId) {
            $sql = "SELECT * FROM products WHERE id=:id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['id' => $productId]);
            return $stmt->fetch();
        }

        public function createProduct($title, $description, $price) {
            $sql = "INSERT INTO products(title,description,price) VALUES (:title,:description,:price)";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute(['title'=> $title,'description'=> $description,'price'=> $price]);
        }

        public function editProduct($id, $title, $description, $price) {
            $sql = "UPDATE products SET title=:title, description=:description, price=:price where id=:id";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute(['id'=> $id,'title'=> $title,'description'=> $description,'price'=> $price]);
        }

        public function deleteProduct($id) {
            $sql = "DELETE FROM products WHERE id=:id";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute(['id'=> $id]);
        }

    }

?>