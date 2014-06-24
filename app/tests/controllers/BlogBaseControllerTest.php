<?php

class BlogBaseControllerTest extends TestCase {

  public function testSingleByIdDraft() {
    $this->action('GET', 'BlogBaseController@single', array('slug' => 2));
    $this->assertRedirectedToRoute('blog_root');
  }

  public function testSingleByIdPublish() {
    $this->action('GET', 'BlogBaseController@single', array('slug' => 1));
    $this->assertRedirectedTo('/blog/posts/psum-dolor-sit-amet');
  }


}

?>
