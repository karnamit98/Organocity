<?PHP

    class PRODUCTS extends DB {

        PRODUCT_ID	PRODUCT_NAME	PRODUCT_TYPE	PRODUCT_PRICE	PRODUCT_IMAGE1	PRODUCT_IMAGE2	PRODUCT_IMAGE3	PRODUCT_DESCRIPTION	ALLERGY_INFORMATION	STOCK_AVAILABLE	MIN_ORDER	MAX_ORDER	CAT_ID	SHOP_ID


        public function setUpProducts($shop_id) 
        {
            $script = oci_parse($this->connect(), "SELECT * FROM PRODUCTS WHERE SHOP_ID = $shop_id");
            oci_execute($script);
            while($row = oci_fetch_assoc($script))
            {
                
            }
        }

    }


?>