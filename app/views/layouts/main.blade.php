<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>JOB SEARCH</title>
        @include('layouts.head')
    </head>

    <body style="background:#E7E7E7;">
        <ul id="menu"  style="background:#A3A3A3 ;">
            <div class="container">
                <li><a href="{{ URL::route('show_all_products') }}"> Browse</a>

                    <div class="dropdown_3columns"><!-- Begin 2 columns container -->

                        <div class="col_3">
                            <h3 style="font-weight: bold">View Category Directory</h3>
                        </div>

                        @foreach($menu_items as $menu_item)
                        <div class="col_1">
                            <ul >
                                <li><a href="{{URL::route('show_product',array('product_type' => str_replace('&','-',str_replace(' ','_',$menu_item->name))))}}" data-toggle="tooltip" data-placement="top"> {{$menu_item->name}} </a></li>
                            </ul>
                        </div>
                        @endforeach
                    </div><!-- End 2 columns container -->

                </li><!-- End Home Item --> 

               
              
<li >{{ HTML::link('#', 'Want') }} <!-- Begin 1 columns Item -->
    
		<div class="dropdown_1column align_left">
        
                <div class="col_1">
                
                    <ul class="simple">
                         @if($myApp->isLogedin)  
                                <li> <a href="{{URL::route('want_to_do',array('want_to_do_type' => "want_to_sell"))}}" data-toggle="tooltip" data-placement="top" title="It is the general type of job">want to sell</a> </li>
                                <li><a href="{{URL::route('want_to_do',array('want_to_do_type' => "want_to_buy"))}}"  data-toggle="tooltip" data-placement="top" title="It is volunteer job">want to buy</a></li>
                                <li><a href="{{URL::route('want_to_do',array('want_to_do_type' => "want_to_recruit"))}}" data-toggle="tooltip" data-placement="top" title="It is the job for learner">want to recruit</a></li>
                                <li><a href="{{URL::route('want_to_do',array('want_to_do_type' => "want_to_job"))}}" data-toggle="tooltip" data-placement="top" title="It is the job for specialists">want a job</a></li>
                                <li><a href="{{URL::route('want_to_do',array('want_to_do_type' => "want_a_partner"))}}" data-toggle="tooltip" data-placement="top" title="It is the master in any fields">want a partner</a></li>
                                <li><a href="{{URL::route('want_to_do',array('want_to_do_type' => "want_a_team"))}}" data-toggle="tooltip" data-placement="top" title="It is the service for the job">want a team</a></li>
                                <li><a href="{{URL::route('want_to_do',array('want_to_do_type' => "want_sb_to_do"))}}" data-toggle="tooltip" data-placement="top" title="It is the master in any fields">want (sb) to do</a></li>
                                <li><a href="{{URL::route('want_to_do',array('want_to_do_type' => "want_other"))}}" data-toggle="tooltip" data-placement="top" title="It is the service for the job">want other</a></li>
                                @else
                                <li> <a href="login" data-toggle="tooltip" data-placement="top" title="It is the general type of job">want to sell</a> </li>
                                <li><a href="login"  data-toggle="tooltip" data-placement="top" title="It is volunteer job">want to buy</a></li>
                                <li><a href="login" data-toggle="tooltip" data-placement="top" title="It is the job for learner">want a job</a></li>
                                <li><a href="login" data-toggle="tooltip" data-placement="top" title="It is the job for specialists">want a partner</a></li>
                                <li><a href="login" data-toggle="tooltip" data-placement="top" title="It is the master in any fields">want a team</a></li>
                                <li><a href="login" data-toggle="tooltip" data-placement="top" title="It is the service for the job">want (sb) to do</a></li>
                                <li><a href="login" data-toggle="tooltip" data-placement="top" title="It is the service for the job">want other</a></li>
                          @endif
                    </ul>   
                     
                </div>
                
		</div>

 <li><!-- End 1 columns Item -->
               

                <li> {{ HTML::link('/dashboard/profile', 'Private') }}<!-- Begin 4 columns Item -->
                </li><!-- End 4 columns Item -->
                <li> 
                    {{ HTML::link('aboutus', 'About Us') }}<!-- Begin 4 columns Item -->
                </li>
                <li> 
                    {{ HTML::link('contactus', 'Contact Us') }}<!-- Begin 2 columns Item -->

                </li>
                <li>{{ HTML::link('request', 'Ask Question') }} <!-- Begin 1 columns Item -->
                </li>
                @if($myApp->isLogedin)
                <li class="menu_right">{{ HTML::link('logout', 'Logout') }}
                </li>   



                @else
                <li class="menu_right">    {{ HTML::link('login', 'Login') }}


                </li>        

                <li class="menu_right"> {{ HTML::link('signup', 'Register') }} <!-- Begin 3 columns Item -->

                </li><!-- End 3 columns Item --> 
                @endif

            </div>
        </ul>
       <div id="search_box_container"></div>
    <div id="search_query">&nbsp;</div>

    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        window.visualSearch = VS.init({
          container  : $('#search_box_container'),
          query      : 'country: "United States" account: 5-samuel "U.S. State": California',
          showFacets : true,
          readOnly   : false,
          unquotable : [
            'text',
            'account',
            'filter',
            'access'
          ],
          callbacks  : {
            search : function(query, searchCollection) {
              var $query = $('#search_query');
              $query.stop().animate({opacity : 1}, {duration: 300, queue: false});
              $query.html('<span class="raquo">&raquo;</span> You searched for: <b>' + searchCollection.serialize() + '</b>');
              clearTimeout(window.queryHideDelay);
              window.queryHideDelay = setTimeout(function() {
                $query.animate({
                  opacity : 0
                }, {
                  duration: 1000,
                  queue: false
                });
              }, 2000);
            },
            valueMatches : function(category, searchTerm, callback) {
              switch (category) {
              case 'account':
                  callback([
                    { value: '1-amanda', label: 'Amanda' },
                    { value: '2-aron',   label: 'Aron' },
                    { value: '3-eric',   label: 'Eric' },
                    { value: '4-jeremy', label: 'Jeremy' },
                    { value: '5-samuel', label: 'Samuel' },
                    { value: '6-scott',  label: 'Scott' }
                  ]);
                  break;
                case 'filter':
                  callback(['published', 'unpublished', 'draft']);
                  break;
                case 'access':
                  callback(['public', 'private', 'protected']);
                  break;
                case 'title':
                  callback([
                    'Pentagon Papers',
                    'CoffeeScript Manual',
                    'Laboratory for Object Oriented Thinking',
                    'A Repository Grows in Brooklyn'
                  ]);
                  break;
                case 'city':
                  callback([
                    'Cleveland',
                    'New York City',
                    'Brooklyn',
                    'Manhattan',
                    'Queens',
                    'The Bronx',
                    'Staten Island',
                    'San Francisco',
                    'Los Angeles',
                    'Seattle',
                    'London',
                    'Portland',
                    'Chicago',
                    'Boston'
                  ])
                  break;
                case 'U.S. State':
                  callback([
                    "Alabama", "Alaska", "Arizona", "Arkansas", "California",
                    "Colorado", "Connecticut", "Delaware", "District of Columbia", "Florida",
                    "Georgia", "Guam", "Hawaii", "Idaho", "Illinois",
                    "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana",
                    "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota",
                    "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada",
                    "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina",
                    "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania",
                    "Puerto Rico", "Rhode Island", "South Carolina", "South Dakota", "Tennessee",
                    "Texas", "Utah", "Vermont", "Virginia", "Virgin Islands",
                    "Washington", "West Virginia", "Wisconsin", "Wyoming"
                  ]);
                  break
                case 'country':
                  callback([
                    "China", "India", "United States", "Indonesia", "Brazil",
                    "Pakistan", "Bangladesh", "Nigeria", "Russia", "Japan",
                    "Mexico", "Philippines", "Vietnam", "Ethiopia", "Egypt",
                    "Germany", "Turkey", "Iran", "Thailand", "D. R. of Congo",
                    "France", "United Kingdom", "Italy", "Myanmar", "South Africa",
                    "South Korea", "Colombia", "Ukraine", "Spain", "Tanzania",
                    "Sudan", "Kenya", "Argentina", "Poland", "Algeria",
                    "Canada", "Uganda", "Morocco", "Iraq", "Nepal",
                    "Peru", "Afghanistan", "Venezuela", "Malaysia", "Uzbekistan",
                    "Saudi Arabia", "Ghana", "Yemen", "North Korea", "Mozambique",
                    "Taiwan", "Syria", "Ivory Coast", "Australia", "Romania",
                    "Sri Lanka", "Madagascar", "Cameroon", "Angola", "Chile",
                    "Netherlands", "Burkina Faso", "Niger", "Kazakhstan", "Malawi",
                    "Cambodia", "Guatemala", "Ecuador", "Mali", "Zambia",
                    "Senegal", "Zimbabwe", "Chad", "Cuba", "Greece",
                    "Portugal", "Belgium", "Czech Republic", "Tunisia", "Guinea",
                    "Rwanda", "Dominican Republic", "Haiti", "Bolivia", "Hungary",
                    "Belarus", "Somalia", "Sweden", "Benin", "Azerbaijan",
                    "Burundi", "Austria", "Honduras", "Switzerland", "Bulgaria",
                    "Serbia", "Israel", "Tajikistan", "Hong Kong", "Papua New Guinea",
                    "Togo", "Libya", "Jordan", "Paraguay", "Laos",
                    "El Salvador", "Sierra Leone", "Nicaragua", "Kyrgyzstan", "Denmark",
                    "Slovakia", "Finland", "Eritrea", "Turkmenistan"
                  ], {
                    preserveOrder: true // Otherwise the selected value is brought to the top
                  });
                  break;
              }
            },
            facetMatches : function(callback) {
              callback([
                'account', 
                'filter', 
                'access', 
                'title',
                { label: 'city',        category: 'location' },
                { label: 'address',     category: 'location' },
                { label: 'country',     category: 'location' },
                { label: 'U.S. State',  category: 'location' },
              ]);
            }
          }
        });
      });
    </script>

        
        @if(!$myApp->isLogedin)
       <ul class="rslides" id="slider1" style="height:350px">
          <li><img src="img/1.jpg" alt=""></li>
          <li><img src="img/2.jpg" alt=""></li>
          <li><img src="img/3.jpg" alt=""></li>
           <li><img src="img/4.jpg" alt=""></li>
          <li><img src="img/5.jpg" alt=""></li>
          <li><img src="img/6.jpg" alt=""></li>
        </ul>
        @endif
        <div class="container">  
            @if(Session::has('message'))
            <p class="alert" style="font-size:16px;color:red">{{ Session::get('message') }}</p>
            <?php Session::forget('message');?>
            @endif

            <div>
                {{ $content }}
            </div>

        </div>

    </body>
    <div id="footer" class="dark_box" style="margin-bottom:0;bottom:0;padding:0" >
        <div class="container bg_dowebs_logo" >
            <p class="text-muted" style="line-height:56px" >&copy;&nbsp; 
                <a href="http://www.baidu.com" target="_blank" alt="Job Search Limited" title="Job Search Limited">Job Search Limited</a> 
                <?echo date('l jS \of F Y h:i:s A');?></p>
        </div> 
    </div>

</html>