<?php

require_once(dirname(__FILE__).'/simpletest/autorun.php');
require_once(dirname(__FILE__).'/simpletest/web_tester.php');
class TestMenuSystem extends WebTestCase {
    function testPage() {
        $url = 'http://localhost/bit562/forms/login.php';
        $this->get($url);
        $this->assertResponse(200);
        $this->assertTitle('Login');
        $this->clickSubmitById('submit');
        $this->assertCookie('PHPSESSID');
        $this->assertResponse(200);
        $this->assertTitle('BIT562 - Home');
        $this->clickLink('Run jumpPointDoc');
        $this->assertResponse(200);
        $this->assertText('The jumpPoint run was successful.');
        $this->back();
        $this->clickLink('Output Docs');
        $this->assertResponse(200);
        $this->assertTitle('');
        $this->assertText('File');
        //A test that will fail.
        $this->back();
        $this->clickLink('PHP Manual');//Opens New Page
        $this->showRequest();
        $this->showHeaders();
        $this->showSource();
        $this->showText();
        $this->assertTitle('PHP: PHP Manual - Manual');
        $this->back();
        $this->assertTitle('BIT562 - Home');
        
        
    }
}