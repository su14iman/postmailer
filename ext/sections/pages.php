



			<div  class="pagec" id="page1" style="height: 100%; overflow-y: auto;">
							

				<div class="container" style="">
						<div style="margin: auto; background-color: #f8f8f8; border-bottom: 1px solid #404041; padding: 1%; text-align: center; margin-top: 0%; font-family: monospace; font-size: 1.3rem; color: #404041;box-shadow: 0px 0px 2px 0px;">
									 Mail list
								</div>
				    <table class="table table-striped" style="text-align: center;margin-top: 2%;">
				        <thead style="background: #6DE3BE;border: 0px solid;color: #fff;text-align: center;">

				            <tr style="background: #404041;text-align: center;margin: auto;">

				            	<th></th>
				                <th style="text-align: center;font-size: 14px;
										">Name</th>

				                <th style="text-align: center;font-size: 14px;
										">Email Adress</th>



				                <th style="text-align: center;font-size: 14px;">
				                    <div style="border: 1px solid #fff;border-radius: 200px;width: 26px;height: 26px;padding: 1%;">
				                        <i style="cursor: pointer;" onclick="Page1_AddViewHtml()" class="fa fa-user-plus" aria-hidden="true"></i>
				                    </div>
				                </th>


				            </tr>
				        </thead>






				        <tbody id="EmplyeeCreateTbody" style="color: #404041;font-size: 12px;">
				 



				        	<tr hidedive="1" id="EmplyeeCreate" style="color: #404041; background-color: #D8D8D8;">
				        	<td></td>
						    <td>
						        <input id="EmplyeeCreateName" type="text" placeholder="Name .." name="name" style="border:0px solid; width: 100%;text-align: center; background-color: #D8D8D8; "> </td>
						    <td>
						        <input id="EmplyeeCreateEmail" type="email" placeholder="Email Adress .. " name="email" style="border:0px solid; width: 100%;text-align: center; background-color: #D8D8D8; "> </td>
						    <td>
						        <div> <i style="cursor: pointer;" onclick="Page1_AddNewName()" class="fa fa-check" aria-hidden="true"></i> </div>
						    </td>
						</tr>
							<tr id="StarTableHere"></tr>				           
				        </tbody>
				    </table>
				</div>

			</div>



			<div class="pagec" id="page2" style="height: 100%; overflow-y: auto;">
				

					<div style="margin: auto; background-color: #f8f8f8; border-bottom: 1px solid #404041; padding: 1%; text-align: center; margin-top: 0%; font-family: monospace; font-size: 1.3rem; color: #404041; box-shadow: 0px 0px 2px 0px;">
						 Setup tempalet
					</div>

					<div style="margin: auto; text-align: center; margin-top: 2%; background: #F7F7F5; width: 58%; font-size:; font-size: 0.6rem; font-family: monospace; padding: 3%;">

					    <div style="text-align: left;">

					        <labe style="float: left; margin-left: 0%; font-size: 1rem;">Logo:</labe>
					       
					        <br>
					        <br>
					        
					        <div>
					            <input id="page2logoURL" placeholder="http://ex.com/ex.jpg" type="url">
					            <button onclick="Page2_UpdateLogo()" style="">Update logo</button>
					        </div>


					    </div>


					    <hr style="width: 100%; background-color: #EC5778;">




					    <div style="text-align: left;">

					        <labe style="float: left; margin-left: 0%; font-size: 1rem;">Postion logo:</labe>
					       
					        <br>
					        <br>
					       
					        <div>
					            <select id="Page2LogoPostion" style="margin-right: 4%; width: 20%; text-align: center;">
					                <option value="2">left</option>
					                <option value="3">right</option>
					                <option value="1" selected="">center</option>
					            </select>
					            <button onclick="Page2_UpdatePostionLogo()" style="">save changes</button>
					        </div>


					    </div>


					    <hr style="width: 100%; background-color: #EC5778;">


					    <div style="text-align: left;">

					        <labe style="float: left; margin-left: 0%; font-size: 1rem;">Color selector:</labe>
					       
					        <br>
					        <br>
					       
					        <div>
					            <label>Color body:</label>
					            <input id="Page2Colorbody" type="color" name="">
					            <br><br>
					            <label>Color header:</label>
					            <input id="Page2Colorheader" type="color" name="">
					            <br><br>
					            <label>Color footer:</label>
					            <input id="Page2Colorfooter" type="color" name="">
					            <br><br>
					            <label>Color body email:</label>
					            <input id="Page2Colorbodyemail" type="color" name="">
					            <br><br>
					            <button onclick="Page2_UpdateColor()" style="">save changes</button>
					        </div>


					    </div>
					</div>
			
			</div>



			<div class="pagec" id="page3" style="height: 100%; overflow-y: auto;">

						<div style="margin: auto; background-color: #f8f8f8; border-bottom: 1px solid #404041; padding: 1%; text-align: center; margin-top: 0%; font-family: monospace; font-size: 1.3rem; color: #404041; box-shadow: 0px 0px 2px 0px;">
						 Contact us
						</div>


						<div style="width: 60%; margin: auto; background-color: #f8f8f8; margin-top: 1%; padding: 2% 2% 2% 4%; color: #404041 ;     font-family: monospace;">
							
							<form>

							  <div class="form-group">
							    <label for="email">Number Phone:</label>
							    <input placeholder="" type="number" class="form-control" id="Page3NumberPhone">
							  </div>

							  
							  <div class="form-group">
							    <label for="email">Email Address:</label>
							    <input placeholder="" type="email" class="form-control" id="Page3Email">
							  </div>

							  
							  <div class="form-group">
							    <label for="email">Address:</label>
							    <input placeholder="" style="height: 80px"  type="text" class="form-control" id="Page3Address">
							  </div>


							  <div style="margin: 4% 4% 4% -3%; color: #9C27B0">
							  	<i class="fa fa-id-card" aria-hidden="true"></i> Preparation of social networks:
							  </div>
							  
							  <div class="form-group">
							    <label for="email">Facebook:</label>
							    <input placeholder="" type="url" class="form-control" id="Page3Facebook">
							  </div>

							  
							  <div class="form-group">
							    <label for="email">Instagram:</label>
							    <input placeholder="" type="url" class="form-control" id="Page3Instagram">
							  </div>

							  
							  <div class="form-group">
							    <label for="email">Twitter:</label>
							    <input placeholder="" type="url" class="form-control" id="Page3Twitter">
							  </div>


							  <div style="text-align: right;">
								  <button type="button" style="background-color: #6DE3BE; color:#fff;     font-family: monospace;" class="btn btn-default" onclick="Page3_UpdateData()">Save changes</button>
							   </div>

							</form>
						</div>

			</div>



			<div class="pagec" id="page4" style="height: 100%; overflow-y: auto;">

						<div style="margin: auto; background-color: #f8f8f8; border-bottom: 1px solid #404041; padding: 1%; text-align: center; margin-top: 0%; font-family: monospace; font-size: 1.3rem; color: #404041; box-shadow: 0px 0px 2px 0px;">
						 Settings
						</div>





						<!-- Change name -->

						<div style="width: 60%; margin: auto; background-color: #f8f8f8; margin-top: 1%; padding: 2% 2% 2% 4%; color: #404041 ;     font-family: monospace;">
							
							<label style="font-size: 1rem">Change name:</label>
							<a id="Page4viewName">Semo Suliaman</a>
							<br>
							<input id="page4inputName" style="margin-left: 2%; border: 0px; width: 90%;" type="text" name="">

							<div style="text-align: right; margin-right: 7%; margin-top: 1%;">
								<button type="submit" style="background-color: #6DE3BE; color:#fff;     font-family: monospace; font-size: 0.7rem" class="btn btn-default" onclick="Page4_UpdateName()">Save changes</button>
							</div>

						</div>







						<!-- Change image -->
						<div style="width: 60%; margin: auto; background-color: #f8f8f8; margin-top: 1%; padding: 2% 2% 2% 4%; color: #404041 ;     font-family: monospace;">
							
							<label style="font-size: 1rem">Change image:</label>
							<br>
							<input style="margin-left: 2%; border: 0px; width: 90%;" type="file" name="">

							<div style="text-align: right; margin-right: 7%; margin-top: 1%;">
								<button type="submit" style="background-color: #6DE3BE; color:#fff;     font-family: monospace; font-size: 0.7rem" class="btn btn-default">Save changes</button>
							</div>

						</div>







						<!-- Change email -->
						<div style="width: 60%; margin: auto; background-color: #f8f8f8; margin-top: 1%; padding: 2% 2% 2% 4%; color: #404041 ;     font-family: monospace;">
							
							<label style="font-size: 1rem">Change email address:</label>
							<a id="Page4viewEmail">semoo@dr.com</a>
							<br>
							<input id="page4inputEmail" style="margin-left: 2%; border: 0px; width: 90%;" type="email" name="">

							<div style="text-align: right; margin-right: 7%; margin-top: 1%;">
								<button type="submit" style="background-color: #6DE3BE; color:#fff;     font-family: monospace; font-size: 0.7rem" class="btn btn-default" onclick="Page4_UpdateEmail()">Save changes</button>
							</div>

						</div>


						<!-- Change email send -->
						<div style="width: 60%; margin: auto; background-color: #f8f8f8; margin-top: 1%; padding: 2% 2% 2% 4%; color: #404041 ;     font-family: monospace;">
							
							<label style="font-size: 1rem">Change email send:</label>
							<a id="Page4viewEmailSend">semoo@dr.com</a>
							<br>
							<input id="page4inputEmailSend" style="margin-left: 2%; border: 0px; width: 90%;" type="email" name="">

							<div style="text-align: right; margin-right: 7%; margin-top: 1%;">
								<button type="submit" style="background-color: #6DE3BE; color:#fff;     font-family: monospace; font-size: 0.7rem" class="btn btn-default" onclick="Page4_UpdateEmailSend()">Save changes</button>
							</div>

						</div>







						<!-- Change password -->
						<div style="width: 60%; margin: auto; background-color: #f8f8f8; margin-top: 1%; padding: 2% 2% 2% 4%; color: #404041 ;     font-family: monospace;">
							
							<label style="font-size: 1rem">Change password:</label>
							<br>
							<input id="page4inputPasCurrut" placeholder="Current Password .. " style="margin-left: 2%; margin-bottom: 2%; border: 0px; width: 90%;" type="passsword" name="">
							
							<input id="page4inputPasNew" placeholder="new password" style="margin-left: 2%; margin-top: 1%; border: 0px; width: 90%;" type="passsword" name="">

							<input id="page4inputPasReNew" placeholder="Re-new password" style="margin-left: 2%; margin-top: 1%; border: 0px; width: 90%;" type="passsword" name="">

							<div style="text-align: right; margin-right: 7%; margin-top: 1%;">
								<button type="submit" style="background-color: #6DE3BE; color:#fff;     font-family: monospace; font-size: 0.7rem" class="btn btn-default" onclick="Page4_UpdatePassword()">Save changes</button>
							</div>

						</div>




						<!-- Account validity -->
						<div style="width: 60%; margin: auto; background-color: #f8f8f8; margin-top: 1%; padding: 2% 2% 2% 4%; color: #404041 ;     font-family: monospace;">
							
							<label style="font-size: 1rem">Account validity:</label>
							<a>Day's:</a>
							<a id="Page4viewDaysLimetd">235</a>
							

						</div>



						<!-- Account login log's -->
						<div style="width: 60%; margin: auto; background-color: #f8f8f8; margin-top: 1%; padding: 2% 2% 2% 4%; color: #404041 ;     font-family: monospace;">
							
							<label style="font-size: 1rem">Log's of login account:</label>
							<a> for print last login </a>
							<button  style="    font-family: monospace; font-size: 0.9rem" class="btn btn-link">Click here</button>


							<div hidedive="1" style=" border-top: 1px solid">

								
								<div>
									<ul>
										<li>1</li>
										<li>Mac'os</li>
										<li>Turkey ' istanbul</li>
										<li>127.0.0.1</li>
										<li>2017.09.22 07:30pm</li>
									</ul>
								</div>
								
								<div>
									<ul>
										<li>1</li>
										<li>Mac'os</li>
										<li>Turkey ' istanbul</li>
										<li>127.0.0.1</li>
										<li>2017.09.22 07:30pm</li>
									</ul>
								</div>
								
								<div>
									<ul>
										<li>1</li>
										<li>Mac'os</li>
										<li>Turkey ' istanbul</li>
										<li>127.0.0.1</li>
										<li>2017.09.22 07:30pm</li>
									</ul>
								</div>
								
								<div>
									<ul>
										<li>1</li>
										<li>Mac'os</li>
										<li>Turkey ' istanbul</li>
										<li>127.0.0.1</li>
										<li>2017.09.22 07:30pm</li>
									</ul>
								</div>

								<div style="text-align: right;">
									<button  style="    font-family: monospace; font-size: 0.9rem" class="btn btn-link">Close log's</button>		
								</div>

							</div>
							

						</div>









						<!-- End Div ..  -->
						<div style="margin-top: 5%;"></div>
				<!-- End Page .  -->
			</div>




			<div class="pagec" id="page5" style="height: 100%; overflow-y: auto;">

						<div style="margin: auto; background-color: #f8f8f8; border-bottom: 1px solid #404041; padding: 1%; text-align: center; margin-top: 0%; font-family: monospace; font-size: 1.3rem; color: #404041; box-shadow: 0px 0px 2px 0px;">
						 Log's email send
						</div>


						<!-- All log's -->

						<div id="page5Alllog" hidedive="0" style="width: 60%; margin: auto; background-color: #f8f8f8; margin-top: 1%; padding: 2% 2% 2% 4%; color: #404041 ;     font-family: monospace;">
							
							<ul>
								<ol id="page5AllLogView">

									<!-- <li><a href="#">2017.09.22</a></li> -->

								
								</ol>
							</ul>

						</div>



						<!--  Log of ID -->
						<div id="page5IDlog" hidedive="1" style="width: 60%; margin: auto; background-color: #f8f8f8; margin-top: 1%; padding: 2% 2% 2% 4%; color: #404041 ;     font-family: monospace;">
							<div style="text-align: center;">
								<h4>2017.09.22</h4>
							</div>
							<ul>
								<ol id="page5IdLogView">

									<!-- <li><a>12:40pm;0|semoo@dr.com|2017-08-08</a></li>
									<li><a>12:40pm;0|semoo@dr.com|2017-08-08</a></li> -->

								
								</ol>
							</ul>

						</div>

			</div>







			<div class="pagec" id="page6" style="height: 100%; overflow-y: auto;">

						<div style="margin: auto; background-color: #f8f8f8; border-bottom: 1px solid #404041; padding: 1%; text-align: center; margin-top: 0%; font-family: monospace; font-size: 1.3rem; color: #404041; box-shadow: 0px 0px 2px 0px;">
						 Create email: Step one
						</div>


						<!-- body -->

						<div hidedive="0" style="width: 60%; margin: auto; background-color: #f8f8f8; margin-top: 1%; padding: 2% 2% 2% 4%; color: #404041 ;     font-family: monospace;">
							<label>Subject:</label><br>
							<input id="page6_subject" type="text" style="width: 90%; border:0px;" name="">

							<br><br>

							<label>E-mail content:</label><br>
							<textarea class="page6_html" id="htmlCodeCK" style="width: 90%; border:0px;"></textarea>
							<br>

							<div style="text-align: right;">
								<button type="submit" style="background-color: #6DE3BE; color:#fff;     font-family: monospace; font-size: 0.7rem" class="btn btn-default" onclick="ButtuonStepOnePage6()">Continue</button>
							</div>
						</div>

						<script type="text/javascript">
							CKEDITOR.replace('htmlCodeCK');
						</script>


			</div>




			<div class="pagec" id="page7" style="height: 100%; overflow-y: auto;">

						<div style="margin: auto; background-color: #f8f8f8; border-bottom: 1px solid #404041; padding: 1%; text-align: center; margin-top: 0%; font-family: monospace; font-size: 1.3rem; color: #404041; box-shadow: 0px 0px 2px 0px;">
						 Create email: Step two
						</div>


						<!-- body -->

						<div id="ajaxTest" hidedive="0" style="width: 90%; margin: auto;  margin-top: 1%; padding: 2% 2% 2% 4%; color: #404041 ;     font-family: monospace;">
							

						</div>
							<div style="text-align: center; border-top: 4px solid #f8f8f8; padding-top:1%;">
								<button type="submit" style="background-color: #6DE3BE; color:#fff;     font-family: monospace; font-size: 1.1rem" class="btn btn-default">Continue</button>
							</div>

			</div>




			<div class="pagec" id="page8" style="height: 100%; overflow-y: auto;">

						<div style="margin: auto; background-color: #f8f8f8; border-bottom: 1px solid #404041; padding: 1%; text-align: center; margin-top: 0%; font-family: monospace; font-size: 1.3rem; color: #404041; box-shadow: 0px 0px 2px 0px;">
						 Create email: Step three
						</div>


						<!-- body -->

						<div hidedive="1" style="width: 60%; margin: auto; background-color: #f8f8f8; margin-top: 1%; padding: 2% 2% 2% 4%; color: #404041 ;     font-family: monospace;">

								<!-- Title -->
								<div style="text-align: center; margin-bottom: 5%;">
									<h4>Send step</h4>
								</div>



								<form>
								  <input type="radio" name="typeSend" value="2" checked> Send to all mail list !!<br>
								  <input type="radio" name="typeSend" value="1"> Send to one person !!<br>
								</form>

								<div style="margin-top: 4%;">
									<label>Person email:</label>
									<input style="border:0px; width: 90%;" type="email" name="" placeholder="abc@abc.com" disabled>
								</div>
								

								<div style="margin-top: 4%; text-align: right;">
									<button type="submit" style="background-color: #6DE3BE; color:#fff;     font-family: monospace; font-size: 0.9rem" class="btn btn-default">Send</button>
								</div>
								



								

						</div>


						<!-- body -->

						<div hidedive="0" style="width: 60%; margin: auto; background-color: #f8f8f8; margin-top: 1%; padding: 2% 2% 2% 4%; color: #404041 ;     font-family: monospace;">

								<!-- Title -->
								<div style="text-align: center; margin-bottom: 5%;">
									<h4>Results step</h4>
								</div>



								<div hidedive="1" class="ResultsOk">
									<p style="color: #6DE3BE; ">
										Email sent successfully .. 
									</p>
								</div>

								

								<div hidedive="1" class="ResultsError">
									<p style="color: #EC5778; ">
										Email sent error .. 
									</p>
								</div>


								<div hidedive="0" class="ResultsWait">
									<p style="color: #404041; ">
										plz wait .. 
									</p>

									<div style="text-align: center;">
										<img  src="./ext/img/Spinner.gif">
									</div>
								</div>


						
						</div>

			</div>








			<div class="pagec" id="pageAds" style="height: 100%; overflow-y: auto;">

					<div style="text-align: center; margin-right: 2%; padding: 2%; font-family: monospace; color: #404041; font-size: 1.6rem">
						
						Ads page :)) 
						<br>
						Welecome 2. PostMailler v1
					</div>

			</div>






