#Topic: Laravel Dusk Testing

**Epics:**  
**1. Registration Test**   
Test Case: As a new user I want to register myself into the system from home page                                            
Steps:                                                                                                                          i. Click register from home page                                                                                         
ii. Enter email ID , Password and Password confirmation                                                                       
Acceptance criteria: User is successfully registered                                                                         
Status: Successful                                                                                                           

**2. Login Test**                                                                                                             
Test Case: As a registered user I want to login into the system to access my home page.                                
Steps:                                                                                                                          i. From home page click on login                                                                                      
i. Enter email and password                                                                                                   
ii. click on Login button                                                                                               Acceptance Criteria: User is successfully logged into his account                                                             
Status: Successful                                                                                                        

Test Case: As a registered user I want to logout from the system.                                                           
Steps:                                                                                                                          i. From home page click on My Account                                                                                    
ii. Click on Logout option from dropdown                                                                                        Acceptance Criteria: User is successfully logged out from System                                                               
Status: Successful                                                                                                          

**3. Questions Test**                                                                                                        
Test Case: as a logged in user I want to add new questions to be visible ion my profile                                      
Steps:                                                                                                                          i. Click the Create a Question button from home page                                                                      
ii. Type the question in body section                                                                                             
iii. click on save                                                                                                                 
Acceptance Criteria: A successful `II WORKS!` message is flashed after question is added into home page.                    
Status: Successful                                                                                              

Test Case: As a logged in user I should be able to view my questions                                                       
Steps:                                                                                                                          i. From home page click the View button on the question you want to view                                                   
Acceptance Criteria: The question opens up in a new page                                                                   
Status: Successful                                                                                                         

Test Case: As a logged in user I want to edit the questions to update them                                            
Steps:                                                                                                                          i. Click on the view button of the question you want to edit                                                               
ii. Click on Edit Question button                                                                                            
iii. Edit the question in body section                                                                                        
iv. Click on Save                                                                                                            
Acceptance Criteria: Question should be successfully updated with a `Saved` message flashed in green                        
Status: Successful

Test Case: As a logged in user I want to delete a question to remove them                                                   
Steps: Click on the View button of the question you want to delete                                                             
Click on Delete button                                                                                                         
Acceptance Criteria: Question is successfully deleted with a `Deleted` message flashed in green                        
Status: Successful                                                                                                  

**4. Answers Test**
Test Case: As a logged in user I want to add answer for the question
Steps: Click on the view button of the question for which you want to add answer
Click on the Answer Question button
Type answer in the body part
Click on Save
Acceptance Criteria: An Answer to the question is added with a successful message `Saved` flashed in green
Status: Successful

Test Case: As a logged in user I want to view an answer to the question
Steps: Click on the view button of the question you desire
       Click on the View button of the Answer you want to View
       Click on Delete Button
Acceptance Criteria: An Answer to the question is opened in a new page
Status: Successful

Test Case: As a logged in user I want to edit an answer to update it
Steps: `Click on the view button of the question you want to edit`
       `Click on the View button of the Answer you want to update`
       `Click on Edit Answer Button`
       `Edit the Answer in body part`
       `Click on Save`
Acceptance Criteria: An Answer to the question is updated with a successful message `Updated` flashed in green
Status: Successful

Test Case: As a logged in user I want to delete an answer to remove it
Steps: `Click on the view button of the question you want to edit`
       `Click on the View button of the Answer you want to delete`
       `Click on Delete Button`
Acceptance Criteria: An Answer to the question is deleted with a successful message `Delete` flashed in green
Status: Successful

**4. Profile Tests**
Test Case: As a logged in user I want to create my Profile
Steps: `From home page click on My account at the right top of the page`
`Select Create Profile`
`Enter details in First name, Last name and Body fields`
`Click on Save`
Acceptance Criteria: `Profile created` Message is flashed on the Screen
Status: Successful

Test Case: As a logged in user I want to view my Profile 
Steps: `From home page click on My account at the right top of the page`
`Select My Profile`
Acceptance Criteria: Profile Details can be viewed
Status: Successful

Test Case: As a logged in user I want to edit my Profile to update it
Steps: From home page click on My account at the right top of the page
Select My Profile
Click on Edit
Edit the desired fields
Click on Save
Acceptance Criteria: `Profile Updated` Message is flashed on the Screen
Status: Successful

