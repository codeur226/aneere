
@section("pageTitle")
{{ $title }}
@endsection

@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('collectes.index') }}">Audits</a></li>
<li class="breadcrumb-item"><a href="#">Details audit</a></li>
<li class="breadcrumb-item active" aria-current="page">Nouvelle collecte</li>

@endsection
<x-master-layout>
	
	<!-- jQuery -->
	{{-- <script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script> --}}
	<!-- jQuery easing plugin -->
    <form action="{{ route('reponses.store') }}" method="POST" enctype="multipart/form-data" id="msform">
        @method("POST")
		@include('pages.back-office.audits.electricites._formulaire')
    </form>
	<script src="{{asset('assetadmin/js/jquery-3.4.1.min.js')}}"></script>
	<script src="{{asset('assetadmin/js/jquery.easing.min.js')}}"></script>
	
	<script>
		$(function () {
		// 	$( ".action-chekbox-yes" ).prop( "checked", true );
        // $(".action-chekbox-yes").click(function () {
        //     if ($(this).is(":checked")) {
        //         $(".sousquestion").show();
        //         $( ".action-chekbox-no" ).prop( "checked", false );
        //     } else {
        //         $(".sousquestion").hide();
		// 		$( ".action-chekbox-no" ).prop( "checked", true );
        //         // $("#AddPassport").show();
        //     }
        // });
		// $(".action-chekbox-no").click(function () {
        //     if ($(this).is(":checked")) {
        //         $(".sousquestion").hide();
        //         $( ".action-chekbox-yes" ).prop( "checked", false );
        //     } else {
        //         $(".sousquestion").show();
		// 		$( ".action-chekbox-yes" ).prop( "checked", true );
        //         // $("#AddPassport").show();
        //     }
        // });
    });
		/*
		Orginal Page: http://thecodeplayer.com/walkthrough/jquery-multi-step-form-with-progress-bar
		
		*/
		//jQuery time
			var current_fs, next_fs, previous_fs; //fieldsets
			var left, opacity, scale,nones; //fieldset properties which we will animate
			var animating; //flag to prevent quick multi-click glitches
			var compteur=0;
			$(".next").click(function(){   compteur++; 

				$( "#action-chekbox-yes"+compteur ).prop( "checked", true );
				$( "#action-chekbox-no"+compteur ).prop( "checked", false );
				$("#sousquestion"+compteur).show();
				$("#option"+compteur+"1").show();
				$("#option"+compteur+"2").hide();
			$("#action-chekbox-yes"+compteur).click(function () {
				if ($(this).is(":checked")) {
					$("#option"+compteur+"1").show();
					$("#option"+compteur+"2").hide();
					$("#sousquestion"+compteur).show();
					$( "#action-chekbox-no"+compteur ).prop( "checked", false );
				} else {
					$("#option"+compteur+"1").hide();
					$("#option"+compteur+"2").show();
					$("#sousquestion"+compteur).hide();
					$( "#action-chekbox-no"+compteur ).prop( "checked", true );
					// $("#AddPassport").show();
				}
			});
			$("#action-chekbox-no"+compteur).click(function () {
				if ($(this).is(":checked")) {
					$("#option"+compteur+"1").hide();
					$("#option"+compteur+"2").show();
					$("#sousquestion"+compteur).hide();
					$( "#action-chekbox-yes"+compteur ).prop( "checked", false );
				} else {
					$("#option"+compteur+"1").show();
					$("#option"+compteur+"2").hide();
					$("#sousquestion"+compteur).show();
					$( "#action-chekbox-yes"+compteur ).prop( "checked", true );
					// $("#AddPassport").show();
				}
			}); 

						if(animating) return false;
								animating = true;
				
					current_fs = $(this).parent();
					next_fs = $(this).parent().next();

							//activate next step on progressbar using the index of next_fs
							$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
							
							//show the next fieldset
							next_fs.show();
							//hide the current fieldset with style
							current_fs.animate({opacity: 0}, {
								step: function(now, mx) {
									//as the opacity of current_fs reduces to 0 - stored in "now"
									//1. scale current_fs down to 80%
									scale = 1 - (1 - now) * 0.2;
									//2. bring next_fs from the right(50%)
									left = (now * 50)+"%";
									//3. increase opacity of next_fs to 1 as it moves in
									opacity = 1 - now;
									current_fs.css({'transform': 'scale('+scale+')'});
									next_fs.css({'left': left, 'opacity': opacity});
								},
								duration: 800,
								complete: function(){
									current_fs.hide();
									animating = false;
								},
								//this comes from the custom easing plugin
								easing: 'easeInOutBack'
							});
					});

$(".previous").click(function(){
						if(animating) return false;
						animating = true;
						compteur--;
						current_fs = $(this).parent();
						previous_fs = $(this).parent().prev();

						//de-activate current step on progressbar
						$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
						
						//show the previous fieldset
						previous_fs.show();
						//hide the current fieldset with style
						current_fs.animate({opacity: 0}, {
							step: function(now, mx) {
								//as the opacity of current_fs reduces to 0 - stored in "now"
								//1. scale previous_fs from 80% to 100%
								scale = 0.8 + (1 - now) * 0.2;
								//2. take current_fs to the right(50%) - from 0%
								left = ((1-now) * 50)+"%";
								//3. increase opacity of previous_fs to 1 as it moves in
								opacity = 1 - now;
								current_fs.css({'left': left});
								previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
							},
							duration: 800,
							complete: function(){
								current_fs.hide();
								animating = false;
							},
							//this comes from the custom easing plugin
							easing: 'easeInOutBack'
						});
				});

$(".submit").click(function(){
	return false;
})
	// function insertFieldSet(ficheId) {
	// 	$.get('{{ url('dashboard/collecte/fiche/question') }}/'+ ficheId + "", function(data) {
			
	// 			$('#fieldset-container').append(data); 

	// 	});
	// }
	
</script>


</x-master-layout>