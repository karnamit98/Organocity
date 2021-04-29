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
