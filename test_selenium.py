from selenium import webdriver

driver = webdriver.Chrome()

driver.get("http://localhost/marksheet_portal/login.php")

print("Title:", driver.title)

driver.quit()