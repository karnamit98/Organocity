-----ADMIN's APP SCRIPTS-----

------HOME PAGE------
---BADGE LIST-----
select
    'Monthly Sales' as label,
     'Rs.' || trim(nvl(sum(p.PAYMENT_AMOUNT),0)) as value,
    apex_util.prepare_url( 'f?p='||:APP_ID||':4:'||:APP_SESSION||':::4,RIR:IRGTE_ORDER_DATE:'||:P1_THIS_MONTH ) as url
from PAYMENT p
where PAYMENT_DATE_TIME >= to_date(to_char(sysdate,'YYYYMM')||'01','YYYYMMDD')
union all
select 
    'Monthly Orders' as label,
    trim(to_char(count(distinct o.INVOICE_NO),'999G999G999G999G990')) as value,
    apex_util.prepare_url( 'f?p='||:APP_ID||':4:'||:APP_SESSION||':::4,RIR:IRGTE_ORDER_DATE:'||:P1_THIS_MONTH ) as url
from ORDERS o
where ORDER_DATE >= to_date(to_char(sysdate,'YYYYMM')||'01','YYYYMMDD')
union all
select 'Total Products' as label,
        trim(to_char(count(distinct p.PRODUCT_NAME),'999G999G999G999G990')) as value,
        apex_util.prepare_url( 'f?p='||:APP_ID||':3:'||:APP_SESSION||':::' ) as url
from PRODUCT p
union all
select 'Total Customers' as label,
        trim(to_char(count(*),'999G999G999G999G990')) as value,
        apex_util.prepare_url( 'f?p='||:APP_ID||':2:'||:APP_SESSION||':::' ) as url
from USERS


-------TOP CUSTOMERS-------
SELECT
    b.FULLNAME as list_title,
    'fa-user' as icon,
    nvl(SUM(p.PAYMENT_AMOUNT),0) order_total,
    count(a.INVOICE_NO) as order_cnt,
    b.USER_ID id,
    b.FULLNAME,
    b.USER_EMAIL,
    b.USERNAME,
    apex_page.get_url(p_page => 7,  p_items => 'P7_CUSTOMER_ID,P7_BRANCH', p_values => b.USER_ID ||','|| '1') link,
    ' ' link_attr,
    ' ' link_class,
    ' ' list_badge,
    ' ' list_class,
    ' ' list_text
FROM
    ORDERS a,
    USERS b,
    PAYMENT p
WHERE
    a.USER_ID = b.USER_ID AND p.PAYMENT_ID = a.PAYMENT_ID
GROUP BY
    b.USER_ID,
    b.FULLNAME,
    b.USER_EMAIL,
    b.USERNAME
ORDER BY
    3 DESC;
    

-----TOP PRODUCTS-------
Select p.PRODUCT_NAME||' - '||SUM(oi.PRODUCT_QUANTITY)||' x '||to_char('Rs.' || p.PRODUCT_PRICE)||'' product,
       SUM(oi.PRODUCT_QUANTITY * oi.UNIT_PRICE) sales,  p.product_id
from ORDER_DETAILS oi
,    PRODUCT p
where oi.PRODUCT_ID = p.PRODUCT_ID
group by p.PRODUCT_ID, p.PRODUCT_NAME, p.PRODUCT_PRICE
order by 2 desc


-------LATEST ORDERS PAGE-----
-------RECENT ORDERS CALENDAR-----
select INVOICE_NO,
       FULLNAME,
       s.SLOT_INFO
       ORDER_STATUS,
       ORDER_DATE,
       USER_ID,
       ORDERS.SLOT_NO,
       COLLECTION_DATE,
       PAYMENT_ID
  from COLLECTION_SLOT s, ORDERS INNER JOIN USERS USING (USER_ID)
  WHERE ORDER_DATE >= (sysdate-14) and s.SLOT_NO = ORDERS.SLOT_NO
  ORDER BY ORDER_DATE DESC
  

------INTERACTIVE REPORT-------
select INVOICE_NO,
       FULLNAME,
       ORDER_DATE,
       s.SLOT_INFO SLOT,
       COLLECTION_DATE,
       PAYMENT_AMOUNT
  from PAYMENT p, COLLECTION_SLOT s, ORDERS INNER JOIN USERS USING (USER_ID)
  WHERE ORDER_DATE >= (sysdate-14) and s.SLOT_NO = ORDERS.SLOT_NO AND p.PAYMENT_ID = ORDERS.PAYMENT_ID
  ORDER BY ORDER_DATE DESC
  



-------ORDER DETAILS PAGE------
-----MASTER RECORDS--------
select "INVOICE_NO",
    null link_class,
    apex_page.get_url(p_items => 'P12_INVOICE_NO', p_values => "INVOICE_NO") link,
    null icon_class,
    null link_attr,
    null icon_color_class,
    case when nvl(:P12_INVOICE_NO,'0') = "INVOICE_NO"
      then 'is-active' 
      else ' '
    end list_class,
    u.FULLNAME as list_title,
     substr("ORDER_DATE", 1, 50)||( case when length("ORDER_DATE") > 50 then '...' end ) list_text,
    null list_badge
from "ORDERS" x, "USERS" u
where (:P12_SEARCH is null
        or upper(x."ORDER_DATE") like '%'||upper(:P12_SEARCH)||'%'
        or upper(x."COLLECTION_DATE") like '%'||upper(:P12_SEARCH)||'%'
    )
    and u.USER_ID = x.USER_ID
    and order_date >= (sysdate-14)
order by "ORDER_DATE"

---------ORDERS---------
select INVOICE_NO,
       ORDER_STATUS,
       ORDER_DATE,
       o.USER_ID,
       o.SLOT_NO,
       u.FULLNAME CUSTOMER,
       s.SLOT_INFO,
       COLLECTION_DATE,
       o.PAYMENT_ID,
       p.PAYMENT_AMOUNT
  from ORDERS o, COLLECTION_SLOT s, PAYMENT p, USERS u
 where "INVOICE_NO" = :P12_INVOICE_NO
 AND o.SLOT_NO = s.SLOT_NO AND o.PAYMENT_ID = p.PAYMENT_ID
 AND o.USER_ID = u.USER_ID




---TRADER PROMOTE REQUEST PAGE------
------TAG CLOUD------
SELECT FULLNAME, TRADER_REQUEST FROM USERS WHERE
USER_TYPE = 'customer' and 
trader_request = 1



-----TRADERS PAGE-------
-------MASTER RECORDS------
select "USER_ID",
    null link_class,
    apex_page.get_url(p_items => 'P50_USER_ID', p_values => "USER_ID") link,
    null icon_class,
    null link_attr,
    null icon_color_class,
    case when nvl(:P50_USER_ID,'0') = "USER_ID"
      then 'is-active' 
      else ' '
    end list_class,
    substr("FULLNAME", 1, 50)||( case when length("FULLNAME") > 50 then '...' end ) list_title,
    substr("USERNAME", 1, 50)||( case when length("USERNAME") > 50 then '...' end ) list_text,
    null list_badge
from "USERS" x
where (:P50_SEARCH is null
        or upper(x."FULLNAME") like '%'||upper(:P50_SEARCH)||'%'
        or upper(x."USERNAME") like '%'||upper(:P50_SEARCH)||'%'
    ) and user_type = 'trader'
order by "FULLNAME"



-----DAILY SALES REPORT PAGE------
------BAR CHART-------
--DAILY_SALES_DISTINCT_VIEW

----REPORT------
--DAILY_SALES_ALL_VIEW


-----WEEKLY SALES REPORT PAGE------
------BAR CHART-------
--WEEKLY_SALES_DISTINCT_VIEW

----REPORT------
--WEEKLY_SALES_ALL_VIEW


-----MONTHLY SALES REPORT PAGE------
------BAR CHART-------
--MONTHLY_SALES_DISTINCT_VIEW

----REPORT------
--MONTHLY_SALES_ALL_VIEW


--------SHOP PRODUCTS PAGE--------
-----HTML 5 BAR CHART PLUG IN-----
SELECT SHOP_NAME, SUM(SUB_TOTAL) SALES FROM ORDER_DETAILS 
INNER JOIN PRODUCT USING(PRODUCT_ID)
INNER JOIN SHOP USING(SHOP_ID)
GROUP BY SHOP_ID, SHOP_NAME;


--------PRODUCT CATOGERIES PAGE--------
-----HTML 5 BAR CHART PLUG IN-----
SELECT CAT_NAME, SUM(SUB_TOTAL) SALES FROM ORDER_DETAILS 
INNER JOIN PRODUCT USING(PRODUCT_ID)
INNER JOIN CATEGORY USING(CAT_ID)
GROUP BY CAT_ID, CAT_NAME;


--------ALL PRODUCTS PAGE-------
-------SALES BY PRODUCT HTML 5 BAR CHART ------
SELECT p.PRODUCT_NAME PRODUCT, SUM(o.SUB_TOTAL) SALES FROM ORDER_DETAILS o
INNER JOIN PRODUCT p USING(PRODUCT_ID) 
GROUP BY p.PRODUCT_NAME;

-------SALES BY PRODUCT HTML 5 BAR CHART ------
SELECT p.PRODUCT_NAME PRODUCT, SUM(o.PRODUCT_QUANTITY) QUANTITY FROM ORDER_DETAILS o
INNER JOIN PRODUCT p USING(PRODUCT_ID) 
GROUP BY p.PRODUCT_NAME;



-------TOTAL SALES BY TRADER PAGE---------
---------PIE CHART-------
SELECT t.FULLNAME, SUM(od.SUB_TOTAL) TOTAL_SALES 
FROM ORDER_DETAILS od INNER JOIN PRODUCT p USING (PRODUCT_ID)
INNER JOIN SHOP s USING (SHOP_ID) INNER JOIN USERS t ON
s.TRADER_ID = t.USER_ID
GROUP BY t.USER_ID, t.FULLNAME

----REPORT-------
SELECT t.FULLNAME TRADER, SUM(od.SUB_TOTAL) TOTAL_SALES 
FROM ORDER_DETAILS od INNER JOIN PRODUCT p USING (PRODUCT_ID)
INNER JOIN SHOP s USING (SHOP_ID) INNER JOIN USERS t ON
s.TRADER_ID = t.USER_ID
GROUP BY t.USER_ID, t.FULLNAME



