<?php

global $CN_Visitor;

$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));

$User = new CN_User($curauth->ID);

get_header();
?>

    <div id="template-user-profile">
        
        <div id="floating-sidebar">
            <a href="">
                <div class="floating-sidebar-item">
                    Register
                </div>
            </a>
        </div>
        
        <div class="container">
            <div class="col-20">
                <h1><?php print($User->getName()); ?> <?php $CN_Visitor->editProfileLink($User->getUserId()); ?></h1>
            </div>
        </div>
        
        <div class="container">
            <div class="col-8">
                <div id="page-sidebar">
                    <div class="sidebar-contents">
                        <h2>Summary</h2>
                        <div class="profile-summary-section">
                            <img class="profile-picture" src="<?php print($User->getPicture()); ?>" />
                            <a href=""><div class="user-contact">Contact</div></a>
                        </div>
                        <div class="profile-summary-section">
                            <?php
                            if($CN_Visitor->editItem($User->getUserId())) {
                            ?>
                            
                                <p><span>Type:</span><br/><?php $User->displayProfileTypeRadioButtons("type"); ?></p>
                                <p><span>Sector:</span><br/><?php $User->displayProfileSectorCheckboxes("sector"); ?></p>
                                
                                <p><span>Company:</span><br/><?php $User->displayProfileCompanyDropdown("company"); ?></p>
                                <p><span>Business Center:</span><br/><?php $User->displayProfileBusinessCenterDropdown("business_center"); ?></p>
                                <p><span>Education:</span><br/><?php $User->displayProfileEducationDropdown("education"); ?></p>
                            
                            <?php
                            }
                            else {
                            ?>
                            
                                <p><span>Type:</span><br/><?php print($User->getType()); ?></p>
                                <p><span>Sector:</span><br/><?php print($User->getSector()); ?></p>
                                <p><span>Company:</span><br/><a href="<?php print($User->getCompany()->getLink()); ?>"><?php print($User->getCompany()->getCompanyName()); ?></a></p>
                                <p><span>Business Center:</span><br/><a href="<?php print($User->getBusinessCenter()->getLink()); ?>"><?php print($User->getBusinessCenter()->getBusinessCenterName()); ?></a></p>
                                <p><span>Education:</span><br/><a href="<?php print($User->getEducation()->getLink()); ?>"><?php print($User->getEducation()->getEducationFacilityName()); ?></a></p>
                            
                            <?php
                            }
                            ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div id="page-content">
                    <h2>About Me</h2>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>