<?php
session_start();

if ($_SESSION['loggedIn'] != true)
  header('location:forms/login.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">

	<head>
		<title>BIT562 - Home</title>
		<link rel="stylesheet" href="css/indexStyle.css" type="text/css" media="screen" />
		<link rel="shortcut icon" href="icon.ico" type="image/x-icon" />

		<script type="text/javascript" src="javascript/dropDownNav.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body>
		<div id="wrapper">
			<div id="container">

				<div id="header">
				</div>

				<div id="navigation">
					<ul class="nav" id="nav">
						<li><a href="index.php" class="navlink">Home</a>
                        <ul>
                        <li class="topline"><a href="https://hostzil.la/user/aff.php?aff=345">Free Project Hosting</a>
                            <ul>
                                <li>
                                   <a href="tests">Tests Folder</a> 
                                </li>
                                <li><a href="https://www.google.com">Search Google</a></li>
                            </ul>
                        </li>
                        
                        </ul>
                        </li>
						<li><a href="forms/login.php" class="navlink">Login</a></li>
                                                
						<li><a class="navlink">Forms</a>
							<ul>
								<li><a href="forms/projectfiles.php">Project Files Form</a></li>
								<li>
									<a href="forms/users.php">Users Form</a>						
								</li>
								<li>
									<a href="forms/codesnippets.php">Code Snippets Form</a>						
								</li>
                                <li>
									<a href="forms/backLogForm.php">Back Log Form</a>						
								</li>
                                <li>
                                <a href="forms/search_files.php">Search Files for text snips</a>
                                </li>
                                <li>
                                <a href="cakephp/cakephp/posts">Project blog<a/>
                                </li>
                              
                                							
							</ul>
						</li>
						<li><a class="navlink">Appplications</a>
							<ul>
								<li><a href="php/jumpPointDoc.php">Run jumpPointDoc</a></li>
								<li>
									<a href="doc">Display jumpPointDoc Output</a>						
								</li>
                                <li>
                                    <a href="php/processSQLTables.php">Process SQL Tables</a>
                                </li>
                                <li>
									<a href="apps/XQTOtablemanager/tm_test.php">Test Table Report</a>						
								</li>
                                <li>
                                    <a href="filemanager.php">File Manager</a>
                                </li>
							</ul>
						</li>			
						<li>
							<a class="navlink">Github</a>
							<ul>
								<li><a href="https://github.com/bit286/bit562" target="repo">Blessed Repository</a></li>
								<li>
									<a class="sub">Remote Repos</a>
									<ul>									
										<li class="topline">
											<a href="https://github.com/edwinski-lap/bit562" target="repo">Ed The Decider</a>
										</li>
										<li>
											<a href="https://github.com/cmgriffing/bit562" target="repo">Chris</a>
										</li>
										<li>
											<a href="https://github.com/Mutate/bit562" target="repo">Tom</a>
										</li>
										<li>
											<a href="https://github.com/masonh/bit562" target="repo">Mason</a>
										</li>
										<li>
											<a href="https://github.com/AlfredAbenes/bit562" target="repo">Alfred</a>
										</li>
										<li>
											<a href="https://github.com/tfinnell/bit562" target="repo">Tim</a>
										</li>
										<li>
											<a href="https://github.com/ltegman/bit562" target="repo">Logan</a>
										</li>
										<li>
											<a href="https://github.com/mwolmstead/bit562" target="repo">Mike O.</a>
										</li>
										<li>
											<a href="https://github.com/waptug/bit562" target="repo">Mike M.</a>
										</li>
										<li>
											<a href="https://github.com/igr-smi/bit562" target="repo">Igor</a>
										</li>
										<li>
											<a href="https://github.com/scbrook/bit562" target="repo">Shawn</a>
										</li>								
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a class="navlink">References</a>
							<ul>
								<li>
									<a href="http://php.net/manual/en/index.php" target="repo">PHP Manual</a>
								</li>
                                                                <li>
									<a href="http://dev.mysql.com/doc/refman/5.0/en/index.html" target="repo">MySQL Manual</a>
								</li>
                                                                <li>
                                                                        <a href="http://www.apachefriends.org/en/faq-xampp.html" target "repo">XAMPP Docs</a>
                                                                </li>
                                                                <li>
                                                                        <a href="http://git-scm.com/documentation" target="repo">GIT Docs</a>
                                                                </li>
                                                                <li>
                                                                        <a href="http://vimdoc.sourceforge.net/htmldoc/editing.html" target "repo">VIM Docs</a>
                                                                </li>
                                                                <li>
                                                                        <a href="http://simpletest.org/api/">SimpleTest API</a>
                                                                </li>
                                                                <li>
                                                                        <a href="http://www.cakephp.org">CakePHP docs</a>
                                                                </li>
                                                                
								<li>
									<a class="sub">W3Schools</a>
									<ul>
										<li class="topline">
											<a href="http://www.w3schools.com/php/default.asp" target="ref">PHP</a>
										</li>
										<li>
											<a href="http://www.w3schools.com/js/default.asp" target="ref">JavaScript</a>
										</li>
										<li>
											<a href="http://www.w3schools.com/jquery/default.asp" target="ref">jQuery</a>
										</li>
										<li>
											<a href="http://www.w3schools.com/sql/default.asp" target="ref">SQL</a>
										</li>
										<li>
											<a href="http://www.w3schools.com/html/default.asp" target="ref">HTML</a>
										</li>
										<li>
											<a href="http://www.w3schools.com/html5/default.asp" target="ref">HTML5</a>
										</li>
										<li>
											<a href="http://www.w3schools.com/htmldom/default.asp" target="ref">DOM</a>
										</li>
										<li>
											<a href="http://www.w3schools.com/css/default.asp" target="ref">CSS</a>
										</li>
										<li>
											<a href="http://www.w3schools.com/css3/default.asp" target="ref">CSS3</a>
										
									</ul>
								</li>
								<li>
									<a href="javascript:window.alert('
										The BIT562 Project is the collaborative effort of three classes at\n
										Cascadia Community College (BIT276, BIT285, and BIT286).\n\n
										Contributing members include:\n\n
										Ed Anderson (Instructor)\n
										Alfred Abenes\n
										Sandus Aqid\n
										Matt Bell\n
										Shawn Brook\n
										Tom Christilaw\n
										Tim Finnell\n
										Chris Griffing\n
										Heather Henderickson\n
										Ted Keith\n
										Michael McGinn\n
										Eric Rootvik\n
										Igor Smirnov\n
										Logan Tegman\n
										Michael Wolmstead\n
										Chea Yeam\n');">About</a>
								</li>
							</ul>
						</li>									
					</ul>
				</div>

				<div id="main">

					<div id="mission">				
						<h2>Mission</h2>
						<p>
							Construct a database driven website which supports the development of professional knowledge in a variety of languages; supports the documentation and integration of the work of software project team members; and increases the long-term productivity of IT professionals.
						</p>
					</div>
					<div id="vision">			
						<h2>Project Vision</h2>
						<p>
							The path to profound knowledge and wisdom in a field can be elusive. In a book entitled <a href="http://www.amazon.com/gp/product/1591842247/ref=as_li_ss_tl?ie=UTF8&tag=geekzonebooks-20&linkCode=as2&camp=1789&creative=390957&creativeASIN=1591842247">&quot;Talent Is Overrated: What Really Separates World-Class Performers from EverybodyElse&quot;</a><img src="http://www.assoc-amazon.com/e/ir?t=geekzonebooks-20&l=as2&o=1&a=1591842247" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                            ,Geoff Colvin sums up the research on the development of expertise as a two part proposition: (1) you have to put your 10,000 hours in, and (2) you have to engage in deliberate practice. Research in a number of fields has shown that simply putting in your time is not enough. As Colvin puts it, &quot;...many people not only failed to become outstandingly good at what they do, no matter how many years they spend doing it, they frequently don&lsquo;t even get any better than they were when they started.&quot; Nonetheless, you have to put the time in. Colvin cites considerable research which casts doubt on the idea of innate talent being much of a predictor of superior performance.
						<p>
						<p>
							Along with the time on task (10,000 hours minimum) comes the idea of deliberate practice.  You must focus on what you don&lsquo;t know. Again in Colvin&lsquo;s words, &quot;...deliberate practice requires that one identify certain sharply defined elements of performance that need to be improved, and then work intensely on them.... The great performers isolate remarkably specific aspect of what they do and focus on just those things until they are improved; then it&lsquo;s on to the next aspect.&quot; Deliberate practice, focusing on what you do not know, is fairly intense.  It takes working up to and even in high level performers four hours a day of deliberate practice is about all they can handle.
						</p>
						<p>
							In a cognitive field like information technology your ability to learn quickly is an essential skill.  It is a skill that improves as your knowledge base gets larger.  Our capacity to remember well is fairly specific to our field of expertise.  &quot;Indeed, top performers&lsquo; deep understanding of their field becomes the structure on which they can hang the huge quantities of information they learn about it.... It&lsquo;s clear that the superior memory of great performers doesn&lsquo;t just happen.  Since it is built on deep understanding of the field, it can be achieved only through years of intensive study.&quot; [Geoffrey Colvin]
						</p>
						<p>
							Professional expertise, then, comes with a price tag, the learning curve must be scaled with effort and with carefully structured practice. The IT field is no exception, but what is particularly odd about IT is that there is so little discussion of the tool set that could be created on a computer to help with the process. What would a tool that assists in the development of a professional skill set look like?
						</p>
						<h3>
							Some suggestions for inclusion in ProTools
						</h3>

					        <ul>
					            <li>
					            	A professional toolkit would presumably include tested and debugged code that could be reused.  For example, validation is a necessity for data in any application.  The code used to provide validation could be structured to make it easy to include in both the front end and the middle tier.  The code could also coordinate validation in the two places through the database.  Other examples would include code to handle data passage between the browser and the database.  Code that we create for ourselves needs to be located (where are we storing it) and documented.
					            </li>
					            <li>
					            	Tested and debugged code might not be stored in separate files.  Smaller pieces of reusable code (snippets) might be kept in a database.  The code might be directly drawn from the database for inclusion in applications dynamically.  HTML particularly lends itself to this use.  The snippets also might be simply stored for cut and paste inclusion into an application.
					            </li>
					            <li>
					            	Code and discussion might also be created simply for the purpose of studying a language.  An example might be using callbacks in PHP function parameter lists.  Some sample code on what it looks like and some discussion might be included just to help prevent forgetting how it works.
					            </li>
					            <li>
					            	Non code discussion of data processing information that you want to remember could also be included.  Discussions and recording of ideas from agile methodology might be an example.
					            </li>
					            <li>
					            	Information tracking coding standards that will be followed in one&lsquo;s professional programming efforts might also be of interest.
					            </li>
					            <li>
					            	URL storage of web sites that have useful programming information would be valuable.  The problem with favorite lists on browsers is that they don&lsquo;t follow us as we move about the web.  There are some good web sites for sharing URLs with other people on the Web, however, they are standalone applications that do not necessarily integrate well with other stored professional knowledge.
					            </li>
					            <li>
					            	Evaluations of available software tools could also prove useful.  The proliferation of high quality frameworks helping solve various application problems is hard to keep up with available solutions.
					            </li>
					            <li>
					            	Since documentation is a professional necessity, the site should support and encourage good documentation habits.  The tools should support the creation of automatically generated documentation in web site form.  In so far as possible documentation should be driven by information contained within the source code documents creating a software application.
					            </li>
					            <li>
					            	Integration of work is a major concern for IT professionals, and so the site should provide support for the integration of project work.  In particular the small tasks derived from the overall project vision and used to create product (overall) and sprint (short interval) backlogs should be published in the database.  Who has committed to work on small projects, time estimates, and actual completion information is valuable and needs to be tracked for each project a team or individual undertakes.  The tracking allows improvement and agile is focused on continuous improvement.
					            </li>
					        </ul>
			            <p>
			            	Expecting every programmer to build a site for their own professional use is unrealistic.  It&lsquo;s a problem that takes considerable effort to resolve well.  Individuals cannot and do not undertake it lightly.  It&lsquo;s a common problem for IT people and consequently it&lsquo;s a problem that should have one or a few generic tools available for long term professional development.  A group of IT knowledgeable folks should have better success at solving the problem than an individual would have.
			            </p>
			            <p>
			            	A site supporting professional development would need to provide that support over an extended time period—careers last for 40 years and beyond.
			            </p>
			            <p>
			            	The site would be driven by open source licensed code. Any professional using it could have access to the code driving the site so as to permit modification and extension.  Presumably, many groups might want to create a clone of the site for their specific purposes and to gain control over the long term viability of their particular site.
			            </p>
			        </div>
				</div>

				<div id="footer">
					<p>
						&copy; 2012 Project BIT562
					</p>

				</div>

			</div>
		</div>
<script type="text/javascript">
	var nav=new nav.dd("nav");
	nav.init("nav","navhover");
</script>
	</body>

</html>
