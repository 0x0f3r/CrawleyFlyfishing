<h3 class='title'>TinkerSoc's Narcoleptic Furby Choir! </h3><div class='content'><p><div><span style="font-size: large;">Abstract</span><br></div><div><br></div><div>TinkerSoc is the `Maker' society at the University of Kent, it aims to</div><div>teach its members basic skills in engineering, electronics, computing</div><div>and radio. As part of this, for a demonstration project to start the</div><div>new academic year, TinkerSoc wished to recycle a popular brand of toy</div><div>released in 1999, known as the Furby and reverse engineer a group of<span id="sceditor-end-marker" class="sceditor-selection sceditor-ignore" style="line-height: 0; display: none;"> </span><span id="sceditor-start-marker" class="sceditor-selection sceditor-ignore" style="line-height: 0; display: none;"> </span></div><div>them into a choir.</div><div><span style="font-size: large;"><br></span></div><div><span style="font-size: large;">Challenge</span><br></div><div><br></div><div>TinkerSoc is the University of Kentâ€™s â€˜Makerâ€™ society, it is</div><div>predominantly an electronics society, but also actively engages with</div><div>engineering and craft. The society is comprised of members from all</div><div>levels of ability, but teaches electronics with the assumption of no</div><div>experience. Each year, the society demonstrates a project that</div><div>highlights the type of things that it will be teaching that year. This</div><div>year, the committee chose to reverse engineer several Furbies[1] to be</div><div>capable of singing in a â€˜choirâ€™.</div><div><br></div><div>The aim of this project was to:&nbsp;</div><div><br></div><div>* Demonstrate that old electronic devices can be recycled for a new use.</div><div>It then checked to see if the motor was currently moving and if not, calculated</div><div>the direction the motor would need to go in order to get to the goal position</div><div>* Understand the role of components in a circuit and how this produces the deviceâ€™s intended function.</div><div>* In the case of old, broken hardware, being able to identify the likely cause of a fault and resolve it.</div><div>* Interface devices with a computer to further expand their capability.</div><div><br></div><div>Because TinkerSoc is a student society, it frequently runs the</div><div>sessions in the evenings out of academic hours. This presents</div><div>It then checked to see if the motor was currently moving and if not, calculated</div><div>the direction the motor would need to go in order to get to the goal position</div><div>difficulties in terms of access to equipment, because the universityâ€™s</div><div>electronic labs will be closed. In the past, this has meant committee</div><div>members supply their own equipment to help out, but this creates an</div><div>over-dependence on a committee that have, and is happy, to provide</div><div>access to their own personal tools.</div><div><br></div><div>As such, TinkerSoc approached B&amp;K</div><div>Precision to help them rectify these problems in order to:</div><div><br></div><div>* Provide members with access to high quality hardware, as used in industry.&nbsp;</div><div>* Reduce the societyâ€™s dependency on members bringing their own equipment and the universityâ€™s lab facilities.&nbsp;</div><div>* Develop the ability for the society to engage with more complex projects.&nbsp;</div><div><br></div><div><br></div><div><font size="4">Solution</font></div><div><br></div><div>In order to succeed in this project, the society first needed to analyse the</div><div>existing circuit board of the toy to understand how the existing components</div><div>provided functionality. Due to the age and popularity of the device, there are</div><div>now numerous examples on the Internet of removing the device's outer skin and a</div><div>mapping of the main sensors. A single motor drives the original version of the</div><div>Furby on a cam-shaft system. The motor's direction is controlled by an</div><div>electronic component known as a H-Bridge. To identify the motor's current</div><div>position in relation to its camshaft system, two additional components are</div><div>used, an infrared optoencoder and a home switch (a simple lever that the</div><div>cam-shaft pushes).</div><div><br></div><div>To start this project, a functional Furby was dismantled</div><div>and an oscilloscope was used to view the pulses created by the optoencoder. It</div><div>was found that for each full revolution of the Furby's camshaft system, 200</div><div>pulses were seen by the optoencoder; this knowledge would become invaluable</div><div>when programming the Furby's replacement microprocessor. Because the original</div><div>infrared diode was soldered directly to the original PCB, a replacement diode</div><div>was tested with the scope to confirm that it was a suitable replacement.</div><div><br></div><div><br></div><div>Next, an auto-ranging multimeter was used to test the main components</div><div>on all of the Furbies, that had been purchased for the project, to</div><div>test their condition. Some Furbyâ€™s had suffered throughout the years,</div><div>but a majority had a complete set of use-able parts. At this point,</div><div>the original PCB for each Furby was removed, leaving just the wires</div><div>that go to the opto-receiver, home switch and motor.&nbsp;</div><div><br></div><div>The next stage of the project was to design a replacement PCB for the Furby.</div><div>The chosen microprocessor for this project was an AtMega328, this was so that</div><div>the Arduino environment would be available. To replace the original H-Bridge,</div><div>the SN754410 quad half h-bridge was selected [2]. This component required three</div><div>digital pins, two of which with PWM capability, from the microprocessor. The</div><div>Furby's optoencoder required a digital input pin capable of hardware interrupts</div><div>and the home switch needed another digital input pin; these were each attached</div><div>to a pull-down resistor. A prototype board was produced and after a few</div><div>problems (a shorted ground that the multimeter helped locate), the Furby was</div><div>controllable from the computer via a serial interface.</div><div><br></div><div>To complete the</div><div>project two pieces of software was produced. The first was for the</div><div>microprocessor. This software would take the next available byte from the</div><div>Serial Input Buffer and use this as a `goal'&nbsp;</div><div><iframe width="560" height="315" src="http://www.youtube.com/embed/M8IDlWM64Jc?wmode=opaque" data-youtube-id="M8IDlWM64Jc" frameborder="0" allowfullscreen=""></iframe></div><div><br></div><div>It then checked to see if the motor was currently moving and if not, calculated</div><div>the direction the motor would need to go in order to get to the goal position</div><div>as quickly as possible. The appropriate pins to control the motor were then</div><div>raised HIGH; PWM was used to be able to speed control the motor (this proved</div><div>useful as each Furby had its own `sweet spot').&nbsp;</div><div><br></div><div>To know what position the</div><div>Furby's cam was currently in and if it had reached its goal position, an</div><div>interrupt handler was attached to the optoencoder. When the encoder's interrupt</div><div>fired, it would first check to see if the home button was currently being</div><div>pressed (if so the camPosition would now be 0) and if it wasn't, then the</div><div>interrupt would check what direction the motor was currently travelling in and</div><div>either decrement or increment the position variable. As this variable was a</div><div>byte, we had 256 possible positions (0-255), however as previously described,</div><div>the Furby's camshaft system only has 200 per full rotation (0-199). Therefore,</div><div>this interrupt also checked to see whether it should wrap around when</div><div>incrementing or decrementing. Outside of this interrupt, if the Furby's motor</div><div>was currently moving, the software would be in a `while loop'; until the goal</div><div>position was equal to the actual position of the cam, at this point the motor</div><div>would then stop by using braking from the H-Bridge.</div><div><br></div><div><br></div><div>The second piece of software was for the computer to control multiple Furbies</div><div>(to create the singing effect). This was written in JAVA and simply played an</div><div>audio file of Queenâ€™s â€˜Bohemian Rhapsodyâ€™.</div><div><br></div><div>A CSV file containing a large amount of millisecond time points with</div><div>goal positions for each Furby was produced. &nbsp;This was imported into a</div><div>queue in the JAVA program and a thread would check to see if the</div><div>current audio file time matched another time-point in the file; if so,</div><div>this byte was sent down the serial line (for the appropriate Furby) by</div><div>the RXTX library and the Furby then performed the action.&nbsp;</div><div><br></div><div>Because of</div><div>the number of Furbyâ€™s in use, a reliable 5V power source was required</div><div>to not only drive all the Furbyâ€™s, but to also provide us with an</div><div>indication that they are running well. A digital power supply was used</div><div>for this. This was easily able to keep up with the varying current</div><div>draw of the Furby choir. &nbsp;</div><div><br></div><div><iframe width="560" height="315" src="http://www.youtube.com/embed/ShiOGtpqBPU?wmode=opaque" data-youtube-id="ShiOGtpqBPU" frameborder="0" allowfullscreen=""></iframe><br></div><div><br></div><div><span style="font-size: large;">Conclusion</span></div><div><br></div><div>With all these pieces in place, the set of Furbies were able to sing</div><div>their ballad (repeatedly) at the yearly â€˜Fresherâ€™s Faireâ€™. Some of the</div><div>Furbyâ€™s suffered malfunction after several hours of running, but we</div><div>have yet to have the spare time to use the oscilloscope to identify</div><div>what is failing (possibly the ATmega328 and the H-Bridge should be</div><div>better protected and likely fails after heavy use).</div><div><br></div><div><iframe width="560" height="315" src="http://www.youtube.com/embed/Dhim-Z2OCqk?wmode=opaque" data-youtube-id="Dhim-Z2OCqk" frameborder="0" allowfullscreen=""></iframe></div><div><br></div><div>We believe this project was a great success. In the next few weeks,</div><div>the society will be using this equipment heavily again so that each</div><div>member can build a headphone tube amp.</div><div><br></div><div>Some more videos</div><div><iframe width="560" height="315" src="http://www.youtube.com/embed/GE5ano_8DBY?wmode=opaque" data-youtube-id="GE5ano_8DBY" frameborder="0" allowfullscreen=""></iframe></div><div><iframe width="560" height="315" src="http://www.youtube.com/embed/H0NAQZcjhpY?wmode=opaque" data-youtube-id="H0NAQZcjhpY" frameborder="0" allowfullscreen=""></iframe><br></div><div><br></div><div><font size="4">Download Code</font></div><div><br></div><div>Here's our code. &nbsp;It's all Licenced as GPL3.</div><div><br></div><div>+ [Java Program]({{site.url}}/assets/downloads/furbies.zip)</div><div>+ [Arduino Sketch]({{site.url}}/assets/downloads/furby.ino)</div><div><br></div><div>[1] A small animatronic hamster/owl that was popular in 1999.</div><div><br></div><div>[2] The electronics drawers had many spare.</div><div><br></div><br></p></div><div class='pull-right' class='date'>Mon 6th Jan 2014 23:28</div>