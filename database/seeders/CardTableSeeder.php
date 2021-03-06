<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cards')->truncate();
        \DB::table('cards')->insert([
            [
                'type'           => 'action',
                'sub_type'       => 'DARE',
                'bg_image'       => 'inner_background',
                'character_image'=> 'pamela1.png',
                'content'        => 'Explain the pythagoren theorem. If you are wrong, you lose',
            ],
            [
                'type'           => 'action',
                'sub_type'       => 'DARE',
                'bg_image'       => 'inner_background',
                'character_image'=> 'pamela1.png',
                'content'        => 'Post a picture of a pregnancy test on your instagram story with the caption “OMG” until the end of the game',
            ],
            [
                'type'           => 'action',
                'sub_type'       => 'TRUTH',
                'bg_image'       => 'inner_background',
                'character_image'=> 'harold.png',
                'content'        => 'What is the most embarrassing reason why you’ve gone to see a doctor?',
            ],
            [
                'type'           => 'action',
                'sub_type'       => 'DARE',
                'bg_image'       => 'inner_background',
                'character_image'=> 'harold.png',
                'content'        => 'Send a $3 Venmo request to the last person you transacted with commenting “magic mushrooms”',
            ],
            [
                'type'           => 'action',
                'sub_type'       => 'TRUTH',
                'bg_image'       => 'inner_background',
                'character_image'=> 'harold.png',
                'content'        => 'Who would you hate to see naked in the group?',
            ],
            [
                'type'           => 'action',
                'sub_type'       => 'TRUTH',
                'bg_image'       => 'inner_background',
                'character_image'=> 'harold.png',
                'content'        => 'What’s the biggest lie you’ve ever told?',
            ],
            [
                'type'           => 'action',
                'sub_type'       => 'TRUTH',
                'bg_image'       => 'inner_background',
                'character_image'=> 'knieveljr.png',
                'content'        => 'What is the most illegal thing you have ever done?',
            ],
            [
                'type'           => 'action',
                'sub_type'       => 'TRUTH',
                'bg_image'       => 'inner_background',
                'character_image'=> 'louis1.png',
                'content'        => 'Tell your most embarrassing story puking',
            ],
            [
                'type'           => 'action',
                'sub_type'       => 'DARE',
                'bg_image'       => 'inner_background',
                'character_image'=> 'louis1.png',
                'content'        => 'Imitate Ace Ventura talking about what you had for lunch out of your butt',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WOULD YOU RATHER',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'pamela1.png',
                'content'        => 'Live the life of a Pokemon Trainer or Captain Jack Sparrow',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WOULD YOU RATHER',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'pamela1.png',
                'content'        => 'Be vegan for a year or not be able to use social media for 3 months?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WOULD YOU RATHER',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'pamela1.png',
                'content'        => 'Have lunch with Oprah and Gail or Martha Stewart and Snoop Dogg?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WHO IS MOST LIKELY',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'pamela1.png',
                'content'        => 'To have failed the most amount of classes?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WHO IS MOST LIKELY',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'pamela1.png',
                'content'        => 'To be the last one in the group to lose their virginity?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WHO IS MOST LIKELY',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'pamela1.png',
                'content'        => 'To drive 2 hours to buy Gourmet Cheese?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'CHALLENGE',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'pamela1.png',
                'content'        => 'Star wars characters',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'CHALLENGE',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'pamela1.png',
                'content'        => 'U.S. State Capitals',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WOULD YOU RATHER',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'harold.png',
                'content'        => 'Have Stevie Nicks or Bob Marley as a roommate?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WOULD YOU RATHER',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'harold.png',
                'content'        => 'Live at Joe Exotic’s Zoo or with an Amish Family for 6 months?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WHO IS MOST LIKELY',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'harold.png',
                'content'        => 'To get a tattoo below their belly button that says “Road to Happiness”?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WHO IS MOST LIKELY',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'harold.png',
                'content'        => 'To eat magic mushrooms in their cereal for breakfast?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WHO IS MOST LIKELY',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'harold.png',
                'content'        => 'To give up everything to raise Llamas in Peru?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'CHALLENGE',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'harold.png',
                'content'        => 'U.S National Parks',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'CHALLENGE',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'harold.png',
                'content'        => 'Music Festivals',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WOULD YOU RATHER',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'knieveljr.png',
                'content'        => 'Be a member of the Kardashian family or the Kennedy family?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WOULD YOU RATHER',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'knieveljr.png',
                'content'        => 'Give up drinking alcohol or give up sex?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WOULD YOU RATHER',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'knieveljr.png',
                'content'        => 'Save 10 old people or 5 babies?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WHO IS MOST LIKELY',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'knieveljr.png',
                'content'        => 'To send the most nudes?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WHO IS MOST LIKELY',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'knieveljr.png',
                'content'        => 'To hit someone’s car and leave without saying anything?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WHO IS MOST LIKELY',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'knieveljr.png',
                'content'        => 'To be under Investigation by the FBI?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'CHALLENGE',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'knieveljr.png',
                'content'        => 'Tarantino Movies',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'CHALLENGE',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'knieveljr.png',
                'content'        => 'Motorcyle Brands',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WOULD YOU RATHER',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'louis1.png',
                'content'        => 'Have large Pepperoni sized Nipples or no Nipples at all?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WOULD YOU RATHER',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'louis1.png',
                'content'        => 'Live bald your whole life or with a Micropenis?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WOULD YOU RATHER',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'louis1.png',
                'content'        => 'Wear Panties or a Thong?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WHO IS MOST LIKELY',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'louis1.png',
                'content'        => 'To have suspicious activities on the darkweb?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WHO IS MOST LIKELY',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'louis1.png',
                'content'        => 'To spend a night in Jail for stealing Condoms?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'WHO IS MOST LIKELY',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'louis1.png',
                'content'        => 'To wake up in the wrong house after a night partying?',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'CHALLENGE',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'louis1.png',
                'content'        => 'Beer Brands',
            ],
            [
                'type'           => 'wild',
                'sub_type'       => 'CHALLENGE',
                'bg_image'       => 'sec_screen_bg',
                'character_image'=> 'louis1.png',
                'content'        => 'Movies starring will ferrell',
            ],
            [
                'type'           => 'big bean',
                'sub_type'       => 'RAPID FIRE TRIVIA',
                'bg_image'       => 'big_bean',
                'character_image'=> '',
                'content'        => 'NFL Teams',
            ],
            [
                'type'           => 'big bean',
                'sub_type'       => 'RAPID FIRE TRIVIA',
                'bg_image'       => 'big_bean',
                'character_image'=> '',
                'content'        => 'Tv shows currently on Netflix',
            ],
            [
                'type'           => 'big bean',
                'sub_type'       => 'RAPID FIRE TRIVIA',
                'bg_image'       => 'big_bean',
                'character_image'=> '',
                'content'        => 'Dog Breeds',
            ],
            [
                'type'           => 'big bean',
                'sub_type'       => 'RAPID FIRE TRIVIA',
                'bg_image'       => 'big_bean',
                'character_image'=> '',
                'content'        => 'Cereal Brands',
            ],
            [
                'type'           => 'big bean',
                'sub_type'       => 'RAPID FIRE TRIVIA',
                'bg_image'       => 'big_bean',
                'character_image'=> '',
                'content'        => 'Countries in the European Union',
            ],
            [
                'type'           => 'big bean',
                'sub_type'       => 'RAPID FIRE TRIVIA',
                'bg_image'       => 'big_bean',
                'character_image'=> '',
                'content'        => 'Hotels in Las Vegas',
            ],
        ]);
    }
}
