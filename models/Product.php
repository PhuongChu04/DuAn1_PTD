<?php
require_once '../connect/connect.php';
class Product extends connect
{
    public function getAllColor()
    {
        $sql = 'SELECT * from colors';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllSize()
    {
        $sql = 'SELECT * from sizes';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllCategory()
    {
        $sql = 'SELECT * from categorys';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addProduct($category_id, $name, $image, $price, $sale_price, $slug, $description)
    {
        $sql = 'INSERT INTO products(category_id,name,image,price,sale_price,slug,description) values(?,?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$category_id, $name, $image, $price, $sale_price, $slug, $description]);
    }
    public function addGallery($product_id, $image)
    {
        $sql = 'INSERT INTO product_galleries(product_id,image) values(?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$product_id, $image]);
    }
    public function addProductVariant($price, $sale_price, $quantity, $product_id, $color_id, $size_id)
    {
        $sql = 'INSERT INTO product_variants(price,sale_price,quantity,product_id,color_id,size_id,created_at,updated_at) values(?,?,?,?,?,?,now(),now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$price, $sale_price, $quantity, $product_id, $color_id, $size_id]);
    }
    public function getLastInsertId()
    {
        return $this->connect()->lastInsertId();
    }
    public function listProduct()
    {
        $sql = "SELECT
        products.product_id as product_id,
        products.name as product_name,
        products.price as product_price,
        products.sale_price as product_sale_price,
        products.image as product_image,
        products.slug as product_slug,
        categorys.category_id as category_id,
        categorys.name as category_name,
        product_variants.product_variant_id as product_variant_id,
        colors.color_name as color_name,
        product_variants.quantity AS product_variant_quantity,
        sizes.size_name as size_name
        
        FROM products
        left join categorys on products.category_id = categorys.category_id 
        left join product_variants on products.product_id = product_variants.product_id
        left join colors on product_variants.color_id = colors.color_id 
        left join sizes on product_variants.size_id = sizes.size_id 
        ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $listProduct = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $groupedProducts = [];
        // Lặp qua từng sản phẩm trong danh sách list product
        foreach ($listProduct as $product) {
            if (!isset($groupedProducts[$product['product_id']])) {
                $groupedProducts[$product['product_id']] = $product;
                $groupedProducts[$product['product_id']]['variants'] = [];
            }
            //Thêm các biến thể color size ... variant[]
            $groupedProducts[$product['product_id']]['variants'][] = [
                'product_id' => $product['product_id'],
                'product_variant_color' => $product['color_name'],
                'product_variant_size' => $product['size_name'],
                'product_variant_quantity' => $product['product_variant_quantity']

            ];
        }//
        return $groupedProducts;
    }
    public function getProductById($product_id)
    {
        $sql = "SELECT
        products.product_id as product_id,
        products.name as product_name,
        products.price as product_price,
        products.sale_price as product_sale_price,
        products.image as product_image,
        products.description as product_description,
        products.slug as product_slug,
        categorys.category_id as category_id,
        categorys.name as category_name
        FROM products
        left join categorys on products.category_id = categorys.category_id 
        where products.product_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getProductVariantById($product_id)
    {
        $sql = "SELECT
        product_variants.product_variant_id as product_variant_id,
        product_variants.price as variant_price,
        product_variants.sale_price as variant_sale_price,
        product_variants.quantity as variant_quantity,
        colors.color_id as color_id,
        sizes.size_id as size_id,
        colors.color_name as color_name,
        sizes.size_name as size_name
        FROM product_variants
        left join colors on product_variants.color_id = colors.color_id 
        left join sizes on product_variants.size_id = sizes.size_id 
        where product_variants.product_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductGalleryById()
    {
        $sql = 'SELECT * FROM product_galleries where product_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //cap nhat
    public function updateProduct($product_id, $category_id, $name, $image, $price, $sale_price, $slug, $description)
    {
        $sql = 'UPDATE products SET category_id=?, name=?, image=?, price=?, sale_price=?, slug=?, description=? WHERE product_id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$category_id, $name, $image, $price, $sale_price, $slug, $description, $product_id]);
    }
    public function updateProductVariant($product_variant_id, $price, $sale_price, $quantity, $product_id, $color_id, $size_id)
    {
        $sql = 'UPDATE product_variants SET price=?,sale_price=?,quantity=?,product_id=?,color_id=?,size_id=? WHERE product_variant_id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$price, $sale_price, $quantity, $product_id, $color_id, $size_id, $product_variant_id]);
    }
    


    public function getProductBySlug($slug)
    {
        $sql = "SELECT
        products.product_id as product_id,
        products.name as product_name,
        products.price as product_price,
        products.sale_price as product_sale_price,
        products.image as product_image,
        products.description as product_description,
        products.slug as product_slug,
        categorys.category_id as category_id,
        categorys.name as category_name,
        product_variants.product_variant_id as product_variant_id,
        product_variants.price as variant_price,
        product_variants.sale_price as variant_sale_price,
        product_variants.quantity as variant_quantity,
        colors.color_name as color_name,
        colors.color_code as color_code,
        sizes.size_name as size_name,
        product_galleries.image as product_gallery_image
        
        FROM products
        left join categorys on products.category_id = categorys.category_id 
        left join product_variants on products.product_id = product_variants.product_id
        left join product_galleries on products.product_id = product_galleries.product_id
        left join colors on product_variants.color_id = colors.color_id 
        left join sizes on product_variants.size_id = sizes.size_id 
        where products.slug = ? 
        ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$slug]);
        $listProduct = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $groupedProducts = [];
        // Lặp qua từng sản phẩm trong danh sách list product
        foreach ($listProduct as $product) {
            if (!isset($groupedProducts[$product['product_id']])) {
                $groupedProducts[$product['product_id']] = $product;
                $groupedProducts[$product['product_id']]['variants'] = [];
                $groupedProducts[$product['product_id']]['galleries'] = [];
            }
            //kiểm tra biên thể đã có trong mảng hay chưa
            $exists = false;
            foreach ($groupedProducts[$product['product_id']]['variants'] as $variant) {
                if ($variant['product_variant_color'] === $product['color_name'] &&
                    $variant['product_variant_size'] === $product['size_name']
                ) {
                    $exists = true;
                    break;
                }
            }
            if(!$exists){
                //Thêm các biến thể color size ... variant[]
                $groupedProducts[$product['product_id']]['variants'][] = [
                    'product_variant_id' => $product['product_variant_id'],
                    'product_variant_color' => $product['color_name'],
                    'product_variant_color_code' => $product['color_code'],
                    'product_variant_size' => $product['size_name'],
                    'product_variant_price' => $product['variant_price'],
                    'product_variant_sale_price' => $product['variant_sale_price'],
                    'product_variant_quantity' => $product['variant_quantity']
                ];
            }
            if (!isset($groupedProducts[$product['product_id']]['galleries'])) {
                $groupedProducts[$product['product_id']]['galleries'] = [];
            }
            
            if (!empty($product['product_gallery_image']) && 
                !in_array($product['product_gallery_image'], $groupedProducts[$product['product_id']]['galleries'], true)) {
                $groupedProducts[$product['product_id']]['galleries'][] = $product['product_gallery_image'];
            }
        }
        return $groupedProducts;
    }

    public function removeGallery()
    {
        $sql = "DELETE FROM product_galleries WHERE product_gallery_id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['gallery_id']]);
    }

    public function getGallery()
    {
        $sql = "SELECT image FROM product_galleries WHERE product_gallery_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['gallery_id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function removeProductVariant()
    {
        $sql = "DELETE FROM product_variants WHERE product_variant_id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['variant_id']]);
    }

    public function removeProduct()
    {
        $sql = "DELETE FROM products WHERE product_id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['id']]);
    }
    public function search($keyword){
        $sql = 'SELECT 
        products.product_id as product_id,
        products.name as product_name,
        products.image as product_image,
        products.price as product_price,
        products.slug as product_slug,
        products.sale_price as product_sale_price,
        categorys.name as category_name
        FROM products 
        left join categorys on products.category_id = categorys.category_id
        where lower(products.name) like lower(?) ';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['%' . $keyword . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
}