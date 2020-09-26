API:
View nguoi dung(action: click, delete, update) || Load trang (get) ||, 1 Action -> Click them san pham

Luong san pham:


1. Get list product
Request URL: giangca.com/api/products
METHODS: GET
Params: null

2. Get detail product
Request URL: giangca.com/api/products/:id
METHODS: GET
Params: product_id //1

3. Delete 1 product
Request URL: giangca.com/api/products/:id
METHODS: DELETE
Params: product_id //1

4. Update 1 product
Request URL: giangca.com/api/products/1
METHODS: PUT
Params: {
product_name: $request->name;
product_price: $request->price
}


