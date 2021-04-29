INSERT INTO USERS (user_id, username, user_type, added_by, fullname, user_image, user_contact, user_email, password, verification_status, trader_request)
VALUES (1, 'amit', 'admin', '', 'Amit Karn', 'amit.JPG', 987654321, 'amit.karn98@gmail.com', 'Amitkarn@123',1, 0);
INSERT INTO USERS (user_id, username, user_type, added_by, fullname, user_image, user_contact, user_email, password, verification_status, trader_request)
VALUES (2, 'saurav', 'admin', '', 'Saurav Shrestha', 'saurav.JPG', 987654321, 'sauravshrestha28@gmail.com', 'Saurav@123',1, 0);
INSERT INTO USERS (user_id, username, user_type, added_by, fullname, user_image, user_contact, user_email, password, verification_status, trader_request)
VALUES (3, 'yogesh', 'admin', '', 'Yogesh Shrestha', 'yogesh.JPG', 987654321, 'yogesh.stha36@gmail.com', 'Yogesh@123',1, 0);

INSERT INTO USERS (user_id, username, user_type, added_by, fullname, user_image, user_contact, user_email, password, verification_status, trader_request)
VALUES (4, 'kritika', 'trader', 1, 'Kritika Thapa', 'kritika.JPG', 987654321, 'thapakritika019@gmail.com', 'Kritika@123',1, 0);
INSERT INTO USERS (user_id, username, user_type, added_by, fullname, user_image, user_contact, user_email, password, verification_status, trader_request)
VALUES (5, 'biku', 'trader', 2, 'Bikram Chand', 'biku.JPG', 987654321, 'bikramchand31@gmail.com', 'Bikram@123',1, 0);
INSERT INTO USERS (user_id, username, user_type, added_by, fullname, user_image, user_contact, user_email, password, verification_status, trader_request)
VALUES (6, 'saugat', 'trader', 1, 'Saugat Adhikari', 'saugat.JPG', 987654321, '@gmail.com', 'Saugat@123',1, 0);
INSERT INTO USERS (user_id, username, user_type, added_by, fullname, user_image, user_contact, user_email, password, verification_status, trader_request)
VALUES (7, 'rambabu', 'trader', 2, 'Rambabu Shah', 'rambabu.JPG', 987654321, 'rambabushah14@gmail.com', 'Rambabu@123',1, 0);
INSERT INTO USERS (user_id, username, user_type, added_by, fullname, user_image, user_contact, user_email, password, verification_status, trader_request)
VALUES (8, 'suprad', 'trader', 1, 'Suprad Budathoki', 'suprad.JPG', 987654321, 'suprad.budathoki08@gmail.com', 'Suprad@123',1, 0);

INSERT INTO USERS (user_id, username, user_type, added_by, fullname, user_image, user_contact, user_email, password, verification_status, trader_request)
VALUES (9, 'aashu', 'customer', '', 'Aashutosh Adhikari', 'aashu.JPG', 9876543210, 'axutoz_faith@yahoo.com', 'Aashutosh@123',1, 0);
INSERT INTO USERS (user_id, username, user_type, added_by, fullname, user_image, user_contact, user_email, password, verification_status, trader_request)
VALUES (10, 'laxit', 'customer', '', 'Laxit Kadayat', 'laxit.JPG', 9856433243, 'laxit007@gmail.com', 'Laxit@123',1, 0);
INSERT INTO USERS (user_id, username, user_type, added_by, fullname, user_image, user_contact, user_email, password, verification_status, trader_request)
VALUES (11, 'shaibya', 'customer', '', 'Shaibya Bhandari', 'shaibya.JPG', 9856433243, 'shaibyabhandari18@gmail.com', 'Shaibya@123',1, 0);
INSERT INTO USERS (user_id, username, user_type, added_by, fullname, user_image, user_contact, user_email, password, verification_status, trader_request)
VALUES (12, 'sanila', 'customer', '', 'Sanila Khadka', 'sanila.JPG', 9856433243, 'sanila.khadka032@gmail.com', 'Sanila@123',1, 0);
INSERT INTO USERS (user_id, username, user_type, added_by, fullname, user_image, user_contact, user_email, password, verification_status, trader_request)
VALUES (13, 'bishant', 'customer', '', 'Bishant Bhattrai', 'bishant.JPG', 9856433243, 'bishant369@gmail.com', 'Bishant@123',1, 0);


INSERT INTO SHOP (shop_id, shop_name, shop_location, trader_id)
VALUES (1, 'Butcher Shop', 'Lagankhel', 8);
INSERT INTO SHOP (shop_id, shop_name, shop_location, trader_id)
VALUES (2, 'Greengrocery Shop', 'Lagankhel', 4);
INSERT INTO SHOP (shop_id, shop_name, shop_location, trader_id)
VALUES (3, 'Bakery Shop', 'Lagankhel', 7);
INSERT INTO SHOP (shop_id, shop_name, shop_location, trader_id)
VALUES (4, 'Fishmonger Shop', 'Lagankhel', 6);
INSERT INTO SHOP (shop_id, shop_name, shop_location, trader_id)
VALUES (5, 'Delicatessen Shop', 'Lagankhel', 5);


INSERT INTO CATEGORY (cat_id, cat_name, cat_image)
VALUES (1, 'Meat', 'butcher.JPG');
INSERT INTO CATEGORY (cat_id, cat_name, cat_image)
VALUES (2, 'Vegetables and Fruits', 'greengrocery.JPG');
INSERT INTO CATEGORY (cat_id, cat_name, cat_image)
VALUES (3, 'Bakery and Cakes', 'bakery.JPG');
INSERT INTO CATEGORY (cat_id, cat_name, cat_image)
VALUES (4, 'Fishes and Seafood', 'fishmonger.JPG');
INSERT INTO CATEGORY (cat_id, cat_name, cat_image)
VALUES (5, 'Fast Foods and Delicatessen', 'delicatessen.JPG');

INSERT INTO COLLECTION_SLOT (slot_no, slot_info, this_week_orders, next_week_orders) 
VALUES ( 1, ' 10am-1pm, Wednesday ', 0, 0);	
INSERT INTO COLLECTION_SLOT (slot_no, slot_info, this_week_orders, next_week_orders) 
VALUES ( 2, ' 1pm-4pm, Wednesday ', 0, 0);	
INSERT INTO COLLECTION_SLOT (slot_no, slot_info, this_week_orders, next_week_orders) 
VALUES ( 3, ' 4pm-7pm, Wednesday ', 0, 0);	
INSERT INTO COLLECTION_SLOT (slot_no, slot_info, this_week_orders, next_week_orders) 
VALUES ( 4, ' 10am-1pm, Thrusday', 0, 0);	
INSERT INTO COLLECTION_SLOT (slot_no, slot_info, this_week_orders, next_week_orders) 
VALUES ( 5, ' 1pm-4pm, Thrusday ', 0, 0);
INSERT INTO COLLECTION_SLOT (slot_no, slot_info, this_week_orders, next_week_orders) 
VALUES ( 6, ' 4pm-7pm, Thrusday ', 0, 0);	
INSERT INTO COLLECTION_SLOT (slot_no, slot_info, this_week_orders, next_week_orders) 
VALUES ( 7, ' 10am-1pm, Friday ', 0, 0);	
INSERT INTO COLLECTION_SLOT (slot_no, slot_info, this_week_orders, next_week_orders)
VALUES ( 8, ' 1pm-4pm, Friday ', 0, 0);	
INSERT INTO COLLECTION_SLOT (slot_no, slot_info, this_week_orders, next_week_orders) 
VALUES ( 9, ' 4pm-7pm, Friday ', 0, 0);	

INSERT INTO CART(cart_no, user_id)
VALUES (1, 1);
INSERT INTO CART(cart_no, user_id)
VALUES (2, 2);
INSERT INTO CART(cart_no, user_id)
VALUES (3, 3);
INSERT INTO CART(cart_no, user_id)
VALUES (4, 4);
INSERT INTO CART(cart_no, user_id)
VALUES (5, 5);
INSERT INTO CART(cart_no, user_id)
VALUES (6, 6);
INSERT INTO CART(cart_no, user_id)
VALUES (7, 7);
INSERT INTO CART(cart_no, user_id)
VALUES (8, 8);
INSERT INTO CART(cart_no, user_id)
VALUES (9, 9);
INSERT INTO CART(cart_no, user_id)
VALUES (10, 10);
INSERT INTO CART(cart_no, user_id)
VALUES (11, 11);
INSERT INTO CART(cart_no, user_id)
VALUES (12, 12);
INSERT INTO CART(cart_no, user_id)
VALUES (13, 13);



INSERT INTO PRODUCT ( product_id, product_name, product_type, product_price, product_image1,
product_image2, product_image3, product_description, allergy_information, stock_available, 
min_order, max_order, cat_id,shop_id)
VALUES (1, 'Chicken', 'Meat', 200, 'chicken1.JPG', 'chicken2.JPG', 'chicken3.JPG',
'Chicken is a domestical bird which is raised for meats and eggs. It is one of the most common 
and widespread domestic animals that’s less commonly used as pet.',
'People allergic to chicken may have symptoms of itchy, swollen or watery eyes and runny or itchy nose.',
10, 1, 5, 1, 1);

INSERT INTO PRODUCT ( product_id, product_name, product_type, product_price, product_image1,
product_image2, product_image3, product_description, allergy_information, stock_available, 
min_order, max_order, cat_id,shop_id)
VALUES (2, 'Pork', 'Meat', 500, 'pork1.JPG', 'pork2.JPG', 'pork3.JPG',
'Pork is the meat of domestic pork consumed worldwide which can be eaten both freshly cooked and preserved.',
'People allergic to pork have pork-cat syndrome which is a response to cat serum albumin that cross reacts with albumin in pork.',
5, 1, 5, 1, 1);

INSERT INTO PRODUCT ( product_id, product_name, product_type, product_price, product_image1,
product_image2, product_image3, product_description, allergy_information, stock_available, 
min_order, max_order, cat_id,shop_id)
VALUES (3, 'Salmon', 'Fishes and Seafood', 500, 'salmon1.JPG', 'salmon2.JPG', 'salmon3.JPG',
'Salmon is a commonly consumed fish praised for it’s high protein content and omega-3 fatty acids.',
'People allergic to salmon get skin rash, nausea, stomach cramps, indigestion, vomiting or diarrhea.',
20, 2, 10, 4, 4);

INSERT INTO PRODUCT ( product_id, product_name, product_type, product_price, product_image1,
product_image2, product_image3, product_description, allergy_information, stock_available, 
min_order, max_order, cat_id,shop_id)
VALUES (4, 'Trout', 'Fishes and Seafood', 700, 'trout1.JPG', 'trout2.JPG', 'trout3.JPG',
'Trout is one of the famous freshwater fish which is famous for it’s high content of potassium, protein and Omega-3 fatty acids.',
'The allergy symptoms to trout are nausea, stomach cramps, indigestion, vomiting or diarrhea.',
25, 4, 10, 4, 4);

INSERT INTO PRODUCT ( product_id, product_name, product_type, product_price, product_image1,
product_image2, product_image3, product_description, allergy_information, stock_available, 
min_order, max_order, cat_id,shop_id)
VALUES (5, 'Cake', 'Bakery and Cakes', 800, 'cake1.JPG', 'cake2.JPG', 'cake1.JPG',
'Cake is a form if sweet food made from flour, sugar and other ingredients which is usually baked.',
'Preservatives found in some dried fruits and wines have sulphites and sulphur dioxides which are injurious to health.',
30, 1, 10, 3, 3);

INSERT INTO PRODUCT ( product_id, product_name, product_type, product_price, product_image1,
product_image2, product_image3, product_description, allergy_information, stock_available, 
min_order, max_order, cat_id,shop_id)
VALUES (6, 'Bread', 'Bakery and Cakes', 50, 'bread1.JPG', 'bread2.JPG', 'bread3.JPG',
'Bread is a staple food prepared from a dough of flour and water usually by baking.',
'People might develop hives or a rash or get a stomachache with bread allergy.',
40, 5, 20, 3, 3);

INSERT INTO PRODUCT ( product_id, product_name, product_type, product_price, product_image1,
product_image2, product_image3, product_description, allergy_information, stock_available, 
min_order, max_order, cat_id,shop_id)
VALUES (7, 'Apple', 'Vegetables and Fruits', 160, 'apple1.JPG', 'apple2.JPG', 'apple3.JPG',
'Apple is one of the most common juicy fruits in the world which can be green red or yellow.',
'Most apple allergic patients notice itching of mouth and throat and redness or swelling of lips.',
30, 2, 6, 2, 2);

INSERT INTO PRODUCT ( product_id, product_name, product_type, product_price, product_image1,
product_image2, product_image3, product_description, allergy_information, stock_available, 
min_order, max_order, cat_id,shop_id)
VALUES (8, 'Spinach', 'Vegetables ad Fruits', 100, 'spinach1.JPG', 'spinach2.JPG', 'spinach3.JPG',
'Spinach is a leafy herbaceous annual plant grown for its leaves which are used as a vegetable.',
'People allergic to spinach can have itchy skin, hives, abdominal cramps or skin rashes.',
20, 1, 5, 2, 2);

INSERT INTO PRODUCT ( product_id, product_name, product_type, product_price, product_image1,
product_image2, product_image3, product_description, allergy_information, stock_available, 
min_order, max_order, cat_id,shop_id)
VALUES (9, 'Organic Wheat Momo', 'Fast Foods and Delicatessen', 110, 'momo1.JPG', 'momo2.JPG', 'momo3.JPG',
'Momo is a type of steamed filled dumpling popular among the Himalayan regions of South East Asia and made with wheat.',
'Wheat allergy symptoms include swelling, itching or irritation in mouth or throat.',
100, 5, 420, 5, 5);

INSERT INTO PRODUCT ( product_id, product_name, product_type, product_price, product_image1,
product_image2, product_image3, product_description, allergy_information, stock_available, 
min_order, max_order, cat_id,shop_id)
VALUES (5010, 'Organic Wheat Noodles', 'Fast Foods and Delicatessen', 150, 'noodles1.JPG', 'noodles2.JPG', 'Noodles3.JPG',
'Noodles is a long and skinny piece of pasta which can be eaten with butter, cheese or bowl of soup.',
'Wheat allergy symptoms include swelling, itching or irritation in mouth or throat.',
45, 5, 20, 5, 5);


INSERT INTO PRODUCT_CART (product_id, cart_no, quantity)
VALUES (3, 9, 9);
INSERT INTO PRODUCT_CART (product_id, cart_no, quantity)
VALUES (6, 9, 4);
INSERT INTO PRODUCT_CART (product_id, cart_no, quantity)
VALUES (9, 9, 9);
INSERT INTO PRODUCT_CART (product_id, cart_no, quantity)
VALUES (5, 9, 7);



INSERT INTO DISCOUNT (discount_id, discount_name, discount_percent, user_id, product_id)
VALUES (1, 'Lockdown Discount', 20, 5, 9);
INSERT INTO DISCOUNT (discount_id, discount_name, discount_percent, user_id, product_id)
VALUES (2, 'Lockdown Discount', 20, 4, 8);
INSERT INTO DISCOUNT (discount_id, discount_name, discount_percent, user_id, product_id)
VALUES (3, 'Dashain Discount', 30, 6, 3);
INSERT INTO DISCOUNT (discount_id, discount_name, discount_percent, user_id, product_id)
VALUES (4, 'Dashain Discount', 30, 6, 4);
INSERT INTO DISCOUNT (discount_id, discount_name, discount_percent, user_id, product_id)
VALUES (5, 'Valentines Discount', 50, 8, 1);
INSERT INTO DISCOUNT (discount_id, discount_name, discount_percent, user_id, product_id)
VALUES (6, 'Valentines Discount', 50, 8, 2);


INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (1, DATE '2020-5-11', 5, 'The chicken I got from here was awesome!', 1, 9);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (2, DATE '2020-5-10', 4, 'These salmons were quite delicious!', 3, 9);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (3, DATE '2020-5-10', 3, 'I feel these breads are healthy but they could work on its taste a little more!', 5, 9);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (4, DATE '2020-5-12', 4, 'These apples were still quite fresh and juicy when I got it!', 7, 9);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (5, DATE '2020-5-10', 5, 'Momos are love!', 9, 9);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (6, DATE '2020-5-9', 5, 'The pork meat was quite fresh!', 2, 10);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (7, DATE '2020-5-10', 4, 'The trouts tasted brilliant!', 4, 10);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (8, DATE '2020-5-9', 3, 'The cake was well baked and had a balanced sweetness!', 6, 10);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (9, DATE '2020-5-8', 5, 'The spinach was so fresh and green that I ate all of them as raw!', 8, 10);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (10, DATE '2020-5-7', 4, 'The noodles were amazing and hence a good deal!', 10, 10);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (11, DATE '2020-5-28', 4, 'The chicken was really fresh and tasted really good.', 1, 4);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (12, DATE '2020-5-26', 5, 'Some of the best and freshest chicken I have had in years.',1, 11);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (13, DATE '2020-5-22', 3, 'It was good but not the best. Would like better next time.', 2, 12);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (14, DATE '2020-5-28', 4, 'Have not gotten better pork than this yet.', 2, 8);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (15, DATE '2020-5-29', 5, 'Was so fresh that it felt like it was caught today.', 3, 1);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (16, DATE '2020-5-20', 4, 'Really liked it. Would definitely order again.', 3, 4);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (17, DATE '2020-5-21', 3, 'Would really have liked to get something fresher.', 4, 10);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (18, DATE '2020-5-19', 4, 'A solid 8 out of 10.', 4, 3);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (19, DATE '2020-5-18', 4, 'Really liked it but felt a bit stale.', 5, 6);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (20, DATE '2020-5-29', 5, 'Tasted impeccable. Kept wanting to eat more and more.', 5, 7);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (21, DATE '2020-5-15', 3, 'Was a bit stiff and difficult to eat.', 6, 1);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (22, DATE '2020-5-28', 5, 'Really tasty and perfect for breakfast.', 6, 9);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (23, DATE '2020-5-10', 4, 'Felt really fresh and good. Was juicy. Really liked it.', 7, 2);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (24, DATE '2020-5-11', 5, 'Everything from the colour to the taste was PERFECT!!', 7, 4);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (25, DATE '2020-5-16', 4, 'Had a really plesent and fresh smell to it.', 8, 8);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (26, DATE '2020-5-27', 4, 'Really liked it. Gonna buy it next time too.', 8, 10);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (27, DATE '2020-5-26', 5, 'As an avid lover of momo, I found this beyond good.', 9, 9);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (28, DATE '2020-5-25', 4, 'Was good, sauce was a bit meh.', 9, 12);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (29, DATE '2020-5-22', 3, 'I do not know why but was really difficult to cook.', 10,11);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (30, DATE '2020-5-24', 5, 'Cooked smooth and was really good with other ingredients from here.', 10, 5);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (31, DATE '2020-6-1', 1, 'Was so bad..made me vomit with just the smell of!', 2, 13);
INSERT INTO REVIEW (review_id, review_date, rating, review_description, product_id, user_id)
VALUES (32, DATE '2020-6-1', 1, 'The worst food I have ever tasted!', 6, 13);



