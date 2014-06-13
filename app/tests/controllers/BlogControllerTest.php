<?php

class BlogControllerTest extends TestCase {

  public function testSingleByIdDraft() {
    $this->action('GET', 'BlogController@single', array('slug' => 2));
    $this->assertRedirectedToRoute('blog_root');
  }

  public function testSingleByIdPublish() {
    $this->action('GET', 'BlogController@single', array('slug' => 1));
    $this->assertRedirectedTo('/blog/psum-dolor-sit-amet');
  }


}

?>
