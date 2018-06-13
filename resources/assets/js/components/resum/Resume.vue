<template>
	<!-- <div class="container"> -->


		<div>
			<section class="section">
				<div class="content">
					<div class="columns is-8 is-centered">
						<div class="column is-2 column-shadow" style="background: #3f67a7; color: #fff;">
							<div class="content">
								<h1 class="headline">
									<span>
										<span class="icon">
											<i class="fa fa-briefcase"></i>
										</span>Dennis Russell
									</span>
								</h1>
								<div class="cvitem">
									<article class="media">
										<div class="media-left">
											<!-- <TimelineComponent :start="folio.start" :end="folio.end"></TimelineComponent> -->
										</div>
										<div class="media-content">
											<div class="content">
												<p class="title is-4 ">Instructor, Political Scientist, and Football Watcher.
													<a class="icon fa fa-link" href="#"></a></p>
													<p class="subtitle">Location</p>
													<p class="has-text-justified">One year towards a Master's degree. Coursework focused on proper investigation </p>
												</div>
											</div>
										</article>
									</div>
								</div>

							</div>


							<div class="column is-6 card-boxing column-shadow">
								<div class="content">
									<h1 class="headline">
										<span>
											<span class="icon">
												<i class="fa fa-user"></i>
											</span>About Me
										</span>
									</h1>
									<p class="has-text-justified">Well-travelled university graduate. University studies focused on Japanese domestic, and international politics. Graduate studies in political science, with coursework steeped in research methods, theory, and practical application. Various experience with Javascript, Java, and Swift, plus related frameworks.</p>
								</div>

								<!-- education -->

								<div class="content">
									<h1 class="headline">
										<span>
											<span class="icon">
												<i class="fa fa-graduation-cap"></i>
											</span>Education
										</span>
									</h1>

									<div class="cvitem">
										<article class="media">
											<div class="media-left">
												<!-- <TimelineView start="2016" end="2015"></TimelineView> -->
											</div>
											<div class="media-content">
												<div class="content">

													<p class="title is-4 is-capitalized">
														Villanova University 
														<a class="icon fa fa-link" href="#"></a>
													</p>
													<p class="subtitle is-capitalized">
														<span class="is-capitalized has-text-weight-light">Bsc</span>
														<span>MA Political Science</span>
													</p>
													<p class="has-text-justified">One year towards a Master's degree. Coursework focused on proper investigation methods, critical examination of evidence and research</p>
													<p class="headline course-headline"><span><span class="icon">
														<i class="fa fa-arrow-down"></i>
													</span> Coursework</span></p>

													<transition
													name="coursework-transition"
													enter-active-class="animated fadeInDown"
													leave-active-class="animated fadeOutUp"
													>
													<!-- <div v-show="isVisible(index)"> -->
														<div>
															<dl class="course">
																<dt><span>Political Violence </span> <span class="has-text-weight-light">8300</span></dt>
																<dd class="course-detail has-text-justified">Inquiry into what constitutes violence, and how entities use violence for politically-motivated ends. Final paper argued that the US House should switch to MMD.</dd>
															</dl>
														</div>
													</transition>

												</div>
											</div>
										</article>
									</div>
								</div>
								<!-- education -->

								<!-- employment -->
								<div class="content">
									<h1 class="headline">
										<span>
											<span class="icon">
												<i class="fa fa-briefcase"></i>
											</span>Millersville University
										</span>
									</h1>
									<div class="cvitem">
										<article class="media">
											<div class="media-left">
												<!-- <TimelineView start="2014" end="2011"></TimelineView> -->
											</div>
											<div class="media-content">
												<div class="content">
													<p class="title is-4 ">Early English Literature
														<a class="icon fa fa-link" href="#"></a></p>
														<p class="subtitle">ENGL 210</p>
														<p class="has-text-justified">Broad survey of English literature, from Beowulf through Shakespeare. Texts read in their original forms. Extensive background information given by lecturing professor.</p>
													</div>
												</div>
											</article>
										</div>
									</div>
									<!-- employment -->

									<!-- portfolio -->
									<div class="content">
										<h1 class="headline">
											<span>
												<span class="icon">
													<i class="fa fa-briefcase"></i>
												</span>Experience
											</span>
										</h1>
										<div class="cvitem">
											<article class="media">
												<div class="media-left">
													<!-- <TimelineComponent start="2018" end="2017"></TimelineComponent> -->
												</div>
												<div class="media-content">
													<div class="content">
														<p class="title is-4 ">Tohoku Gakuin University 
															<a class="icon fa fa-link" href="#"></a></p>
															<p class="subtitle">Instructor</p>
															<p class="has-text-justified">Will serve as instructor for three units of Integrated English at varying levels. Additionally, will instruct the Academic Presentations course.</p>
														</div>
													</div>
												</article>
											</div>
										</div>
										<!-- portfolio -->

										<!-- Honor -->
										<div class="content">
											<h1 class="headline">
												<span>
													<span class="icon">
														<i class="fa fa-trophy"></i>
													</span>Honors
												</span>
											</h1>
											<div class="cvitem">
												<article class="media">
													<div class="media-left">
<!-- 		        <TimelineComponent start="2018" end="2019"></TimelineComponent>
-->		      </div>
<div class="media-content">
	<div class="content">
		<p class="title is-4">Honors</p>
		<p class="subtitle">Villanova University Graduate Tuition Scholarship</p>
		<p class="has-text-justified">Villanova University Received during my tenure as a graduate student.</p>
	</div>
</div>
</article>
</div>
</div>
<!-- Honor -->

<!-- skills -->
<div class="columns is-variable is-8">
	<div class="column">
		<div class="content">
			<h1 class="headline">
				<span>
					<span class="icon">
						<i class="fa fa-rocket"></i>
					</span>Skills
				</span>
			</h1>
			<dl class="cvitem">
				<dt>
					<i class="fa fa-rocket"></i> Javascript
				</dt>
				<dd class="has-text-justified">
					Self-taught. Constructed several applications, especially with Vue.
				</dd>
			</dl>
		</div>

	</div>
	<div class="column">
		<div class="content">
			<h1 class="headline">
				<span>
					<span class="icon">
						<i class="fa fa-globe"></i>
					</span>Languages
				</span>
			</h1>
			<dl>
				<dt>
					<i class="icon">UK</i>  English
				</dt>
				<dd>
					Native Speaker
				</dd>
			</dl>
		</div>

	</div>
</div>

</div>
</div>
</div>
</section>
<footer class="footer hero">
	<div class="container">
		<div class="content has-text-centered">
			<p>
				<strong>Vuesume</strong> by Dennis Russell. The source code is licensed <a href="http://opensource.org/licenses/mit-license.php">MIT</a>, and available on Github<a href="https://github.com/rasserudenisu/vuesume"><i class="icon fa fa-github"></i></a>
			</p>
		</div>
	</div>
</footer>
<!-- </div> -->
</div>
</template>