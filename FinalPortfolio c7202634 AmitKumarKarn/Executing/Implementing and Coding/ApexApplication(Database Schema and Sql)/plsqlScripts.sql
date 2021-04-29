----PL/SQL USED IN THE WEBSITE------

----TRIGGERS----

CREATE OR REPLACE TRIGGER USERS_on_insert
  BEFORE INSERT ON USERS
  FOR EACH ROW
BEGIN
  SELECT USERS_sequence.nextval
  INTO :new.user_id
  FROM dual;
END;
/


CREATE OR REPLACE TRIGGER COLLECTION_SLOT_on_insert
  BEFORE INSERT ON COLLECTION_SLOT
  FOR EACH ROW
BEGIN
  SELECT COLLECTION_SLOT_sequence.nextval
  INTO :new.slot_no
  FROM dual;
END;
/

CREATE OR REPLACE TRIGGER PAYMENT_on_insert
  BEFORE INSERT ON PAYMENT
  FOR EACH ROW
BEGIN
  SELECT PAYMENT_sequence.nextval
  INTO :new.payment_id
  FROM dual;
END;
/

CREATE OR REPLACE TRIGGER CATEGORY_on_insert
  BEFORE INSERT ON CATEGORY
  FOR EACH ROW
BEGIN
  SELECT CATEGORY_sequence.nextval
  INTO :new.cat_id
  FROM dual;
END;
/

CREATE OR REPLACE TRIGGER SHOP_on_insert
  BEFORE INSERT ON SHOP
  FOR EACH ROW
BEGIN
  SELECT SHOP_sequence.nextval
  INTO :new.shop_id
  FROM dual;
END;
/

CREATE OR REPLACE TRIGGER PRODUCT_on_insert
  BEFORE INSERT ON PRODUCT
  FOR EACH ROW
BEGIN
  SELECT PRODUCT_sequence.nextval
  INTO :new.product_id
  FROM dual;
END;
/

CREATE OR REPLACE TRIGGER DISCOUNT_on_insert
  BEFORE INSERT ON DISCOUNT
  FOR EACH ROW
BEGIN
  SELECT DISCOUNT_sequence.nextval
  INTO :new.discount_id
  FROM dual;
END;
/

CREATE OR REPLACE TRIGGER REVIEW_on_insert
  BEFORE INSERT ON REVIEW
  FOR EACH ROW
BEGIN
  SELECT REVIEW_sequence.nextval
  INTO :new.review_id
  FROM dual;
END;
/

CREATE OR REPLACE TRIGGER ORDERS_on_insert
  BEFORE INSERT ON ORDERS
  FOR EACH ROW
BEGIN
  SELECT ORDERS_sequence.nextval
  INTO :new.invoice_no
  FROM dual;
END;
/

CREATE OR REPLACE TRIGGER ORDER_DETAILS_on_insert
  BEFORE INSERT ON ORDER_DETAILS
  FOR EACH ROW
BEGIN
  SELECT ORDER_DETAILS_sequence.nextval
  INTO :new.detail_id
  FROM dual;
END;
/

CREATE OR REPLACE TRIGGER TEMP_CHECKOUT_on_insert
  BEFORE INSERT ON TEMP_CHECKOUT
  FOR EACH ROW
BEGIN
  SELECT TEMP_CHECKOUT_sequence.nextval
  INTO :new.temp_id
  FROM dual;
END;
/


-----LOGIN AUTHENTICATION----

---ADMIN AUTHENTICATION FOR LOGIN----
FUNCTION my_auth(p_username IN varchar2, p_password in varchar2)
RETURN BOOLEAN AS
num NUMBER := 0;
BEGIN
if(p_password is NULL and p_username is NULL) THEN
raise_application_error(-20112,'Username and password fields cannot be empty!');
RETURN FALSE;
end if;
SELECT 1 INTO num FROM users
where upper(username) = upper(p_username)
and password = p_password
and user_type = 'admin';
RETURN TRUE;
EXCEPTION
WHEN NO_DATA_FOUND THEN
raise_application_error(-20111,'Username and password are invalid for an admin!');
RETURN FALSE;
END my_auth;



----TRADER AUTHENTICATION LOGIN---
FUNCTION my_auth(p_username IN varchar2, p_password in varchar2)
RETURN BOOLEAN AS
num NUMBER := 0;
BEGIN
if(p_password is NULL and p_username is NULL) THEN
raise_application_error(-20112,'Username and password fields cannot be empty!');
RETURN FALSE;
end if;
SELECT 1 INTO num FROM users
where upper(username) = upper(p_username)
and password = p_password
and user_type = 'trader';
RETURN TRUE;
EXCEPTION
WHEN NO_DATA_FOUND THEN
raise_application_error(-20111,'Username and password are invalid for a trader!');
RETURN FALSE;
END my_auth;










