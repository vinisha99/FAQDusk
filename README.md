# Laravel Dusk Testing
- Testing of a self created FAQ blog application using Laravel Dusk API.

# Contents
[Setting up in phpStorm](#Setting-up-project-in-phpStorm:)


**[GitHub Clone URL](https://github.com/vinisha99/FAQDusk.git)**                                                               
**[Heroku Link](https://faq-dusk.herokuapp.com/)**

**Setting up project in phpStorm:**
1. Clone the project from above link and add it in your phpStorm
2. Execute the command `composer install`
3. Create a file named `database.sqlite` into the database folder
4. Copy the path of this file
5. Goto `.env` file and in DB_CONNECTION replace the value of mysql to `sqlite`, Add a new line after this and add DB_DATABASE= followed by the copied path
6. From the top menu bar select View -> Tool Windows -> Database
7. In the Databse window at top left right click on the plus (+) icon from top left corner and select Datasource -> sqlite
8. To add run configuration for the project click on `Add Configuration` -> click on the plus (+) icon from top left corner -> PHP Script. In the form provide a name for the configuration, select single instance only, in the file section locate to the `artisan` file of your project, In arguments enter `serve`. Now in the bottom of the form under 'Before Launch' section click on the plus (+) icon and select `Launch Web Browser` and under url enter `http://localhost:8000`
9. In the terminal execute the command `php artisan migrate:refresh`
10. Now run the project.

**Setting up Heroku**

1. In the terminal execute the following commands:                                                                  app_name=heroku-app-name                                                                                                      
heroku apps:create $app_name                                                                                                   
heroku addons:create heroku-postgresql:hobby-dev --app $app_name                                                          
heroku config:set APP_KEY=$(php artisan --no-ansi key:generate --show)                                                    
heroku config:set APP_LOG=errorlog                                                                                             
heroku config:set APP_ENV=development APP_DEBUG=true APP_LOG_LEVEL=debug                                                      
heroku config:set DB_CONNECTION=pg-heroku                                                                                     
git push heroku master                                                                                                        
heroku run php artisan migrate                                                                                                



**Test Cases**  
**1. Registration Test**   
**Test Case:** As a new user I want to register myself into the system from home page                                           
**Steps:**                                                                                                                    
i. Click register from home page                                                                                         
ii. Enter email ID , Password and Password confirmation                                                                       
**Acceptance criteria:** User is successfully registered                                                                         
**Status:** Successful                                                                                                           

**2. Login Test**                                                                                                             
**Test Case:** As a registered user I want to login into the system to access my home page.                                
Steps:                                                                                                                     
i. From home page click on login                                                                                      
i. Enter email and password                                                                                                   
ii. click on Login button                                                                                          
**Acceptance Criteria:** User is successfully logged into his account                                                             
**Status:** Successful                                                                                                        

**Test Case:** As a registered user I want to logout from the system.                                                           
**Steps:**                                                                                                                      
i. From home page click on My Account                                                                                    
ii. Click on Logout option from dropdown                                                                           
**Acceptance Criteria:** User is successfully logged out from System                                                               
**Status:** Successful                                                                                                          

**3. Questions Test**                                                                                                        
**Test Case:** as a logged in user I want to add new questions to be visible ion my profile                                      
**Steps:**                                                                                                                    
i. Click the Create a Question button from home page                                                                      
ii. Type the question in body section                                                                                        
iii. click on save                                                                                                 
**Acceptance Criteria:** A successful `II WORKS!` message is flashed after question is added into home page.                    
**Status:** Successful                                                                                              

**Test Case:** As a logged in user I should be able to view my questions                                                       
**Steps:**                                                                                                                     
i. From home page click the View button on the question you want to view                                                   
**Acceptance Criteria:** The question opens up in a new page                                                                   
**Status:** Successful                                                                                                         

**Test Case:** As a logged in user I want to edit the questions to update them                                            
**Steps:**                                                                                                                      
i. Click on the view button of the question you want to edit                                                               
ii. Click on Edit Question button                                                                                            
iii. Edit the question in body section                                                                                        
iv. Click on Save                                                                                                            
**Acceptance Criteria:** Question should be successfully updated with a `Saved` message flashed in green                        
**Status:** Successful

**Test Case:** As a logged in user I want to delete a question to remove them                                                   
**Steps:**                                                                                                                  
i. Click on the View button of the question you want to delete                                                                                                                         
ii. Click on Delete button                                                                                                                                                     
**Acceptance Criteria:** Question is successfully deleted with a `Deleted` message flashed in green                        
**Status:** Successful                                                                                                  

**4. Answers Test**                                                                                                           
**Test Case:** As a logged in user I want to add answer for the question                                                      
**Steps:**                                                                                                                  
i. Click on the view button of the question for which you want to add answer                                                    
ii. Click on the Answer Question button                                                                                      
iii. Type answer in the body part                                                                                        
iv. Click on Save                                                                                                        
**Acceptance Criteria:** An Answer to the question is added with a successful message `Saved` flashed in green              
**Status:** Successful                                                                                                      

**Test Case:** As a logged in user I want to view an answer to the question
**Steps:**                                                                                                                       
i. Click on the view button of the question you desire                                                                           
ii. Click on the View button of the Answer you want to View                                                                      
iii. Click on Delete Button                                                                                                      
**Acceptance Criteria:** An Answer to the question is opened in a new page                                                  
**Status:** Successful                                                                                                          

**Test Case:** As a logged in user I want to edit an answer to update it
**Steps:**                                                                                                          
i. Click on the view button of the question you want to edit                                                              
ii. Click on the View button of the Answer you want to update                                                             
iii. Click on Edit Answer Button                                                                                                                        
iv. Edit the Answer in body part                                                                                          
v. Click on Save                                                                                                            
**Acceptance Criteria:** An Answer to the question is updated with a successful message `Updated` flashed in green              
**Status:** Successful                                                                                                          

**Test Case:** As a logged in user I want to delete an answer to remove it                                                                                                          
**Steps:**                                                                                                           
i. Click on the view button of the question you want to edit                                                                                                          
ii. Click on the View button of the Answer you want to delete                                                                                                          
iii. Click on Delete Button                                                                                                          
**Acceptance Criteria:** An Answer to the question is deleted with a successful message `Delete` flashed in green
**Status:** Successful                                                                                                          

**4. Profile Tests**                                                                                                          
**Test Case:** As a logged in user I want to create my Profile                                                                                                          
**Steps:**                                                                                                          
i. From home page click on My account at the right top of the page                                                                                                          
ii. Select Create Profile
iii. Enter details in First name, Last name and Body fields                                                                                                          
iv. Click on Save                                                                                                          
**Acceptance Criteria:** `Profile created` Message is flashed on the Screen                                                                                                          
**Status:** Successful                                                                                                          

**Test Case:** As a logged in user I want to view my Profile                                                                                                           
**Steps:**                                                                                                                                                                                                                    
i. From home page click on My account at the right top of the page                                                                                                          
ii. Select My Profile                                                                                                          
**Acceptance Criteria:** Profile Details can be viewed                                                                                                          
**Status:** Successful                                                                                                          

**Test Case:** As a logged in user I want to edit my Profile to update it                                                                                                          
**Steps:**                                                                                                          
i. From home page click on My account at the right top of the page                                                                                                          
ii. Select My Profile                                                                                                          
iii. Click on Edit                                                                                                          
iv. Edit the desired fields                                                                                                          
v. Click on Save                                                                                                          
**Acceptance Criteria:** `Profile Updated` Message is flashed on the Screen                                                                                                          
**Status:** Successful

