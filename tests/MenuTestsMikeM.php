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
        $this->clickLink('not here');
        $this->assertText('text not here');
        
        
        
    }
}