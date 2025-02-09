<?php
require_once '../connect/connect.php';
class Product extends connect{
    public function getAllColor(){
        $sql='select * from colors';
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getAllSize(){
        $sql='SELECT * FROM sizes';
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
    public function getAllCategory(){
        $sql='SELECT * FROM categorys';
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addProduct($category_id,$name,$image,$price,$sale_price,$slug,$description){
         $sql= 'INSERT INTO products(category_id,name,image,price,sale_price,slug,description) VALUES(?,?,?,?,?,?,?)' ;
         $stmt= $this->connect()->prepare($sql);
        return $stmt->execute([$category_id,$name,$image,$price,$sale_price,$slug,$description]);
    }
    public function addGallery($product_id,$image){
        $sql= 'INSERT INTO product_galleries(product_id,image) VALUES(?,?)' ;
        $stmt= $this->connect()->prepare($sql);
       return $stmt->execute([$product_id,$image]);
   }
   public function addProductVariant($price,$sale_price,$quantity,$product_id,$color_id,$size_id){
    $sql= 'INSERT INTO product_variants(price,sale_price,quantity,product_id,color_id,size_id,created_at,updated_at) VALUES(?,?,?,?,?,?,now(),now())' ;
    $stmt= $this->connect()->prepare($sql);
   return $stmt->execute([$price,$sale_price,$quantity,$product_id,$color_id,$size_id]);
   }
    public function getLastInsertId(){
        return $this->connect()->lastInsertId();

    }
    public function listProduct(){
        $sql="select
        products.product_id as product_id,
        products.name as product_name,
        products.price as product_price,
        products.sale_price as product_sale_price,
        products.image as product_image,
        categorys.category_id as category_id,
        categorys.name as category_name,
        product_variants.product_id as product_variant_id,
        colors.color_name as variant_color_name,
        sizes.size_name as variant_size_name 
        
        from products
        left join categorys on products.category_id = categorys.category_id
        left join product_variants  on products.product_id = product_variants.product_id
        left join colors on product_variants.color_id = colors.color_id
        left join sizes on product_variants.size_id = sizes.size_id
    
        ";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute();
        $listProduct= $stmt->fetchAll(PDO::FETCH_ASSOC);
        $groupProduct=[];
        foreach($listProduct as $product){
            if(!isset($groupProduct[$product['$product_id']])){
                $groupProduct[$product['product_id']]=$product;
                $groupProduct[$product['product_id']]['variants']=[];

            }
            $groupProduct[$product['product_id']]['variants'][]=[
                'product_id'=>$product['product_id'],
                'product_variant_color'=>$product['variant_color_name'],
                'product_variant_size'=>$product['variant_size_name ']
            ];
        }
        return $groupProduct;
    }
    public function getProductById($product_id){
        $sql='select 
        products.product_id as product_id,
        products.name as product_name,
        products.price as product_price,
        products.sale_price as product_sale_price,
        products.image as product_image,  
        products.description as product_description,      
        products.slug as product_slug, 
        categorys.category_id as category_id, 
        categorys.name as category_name 
        from products
        left join categorys on products.category_id = categorys.category_id
        where products.product_id=?
        ';
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getProductVariantById($product_id){
        $sql='
        select
        product_variants.product_variant_id as product_variant_id,
        product_variants.price as variant_price,
        product_variants.sale_price as variant_sale_price,
        product_variants.quantity as variant_quantity,
        colors.color_id as variant_color_id,
        sizes.size_id as variant_size_id,
        colors.color_name as variant_color_name,
        sizes.size_name as variant_size_name
        from product_variants
        left join colors on product_variants.color_id = colors.color_id
        left join sizes on product_variants.size_id = sizes.size_id
        where product_variants.product_id=?
        ';
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductGalleryById($product_id){
        $sql='select * from product_galleries where product_id=?';
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateProduct($product_id,$name,$image,$price,$category_id,$sale_price,$slug,$description){
        $sql='update products  set name =?, image=?, price=?, category_id=?, sale_price=?, slug=?, description=? where product_id=?';
        $stmt=$this->connect()->prepare($sql);
      return $stmt->execute([$name,$image,$price,$category_id,$sale_price,$slug,$description]);
    
    }
    public function updateProductVariant($product_variant_id,$product_id,$price,$sale_price,$variant_color_id,$variant_size_id,$quantity){
        $sql='update product_variants  set product_id=? price=?, sale_price=?, variant_color_id=?, variant_size_id=?, quantity=? where product_variant_id=?';
        $stmt=$this->connect()->prepare($sql);
      return $stmt->execute([$product_id,$price,$sale_price,$variant_color_id,$variant_size_id,$quantity,$product_variant_id]);
    
    }
    
}