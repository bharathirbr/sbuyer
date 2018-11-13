<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\faq;
class faqtableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq')-> delete();
        faq::create([
            	'question'=>'How & where I can give my feedback?',
            'answer'=>'We always welcome feedback, both positive and negative from all our customers. Please feel free to write to us at customerservice@sbuyer.com, or call us at 09500466177 and we will do our best to incorporate your suggestions into our system',
            'order'=>'1',
              'status'=>'Active',
            ]);
        faq::create([
            	'question'=>'I’d like to suggest some products. Who do I contact?',
            'answer'=>'If you are unable to find a product or brand that you would like to shop for, please write to us at customerservice@sbuyer.com and we will try our best to make the product available to you.',
            'order'=>'2',
              'status'=>'Active',
            ]);
        faq::create([
            	'question'=>'I am a corporate/ business. Can I place orders with sbuyer.com?',
            'answer'=>'Yes, we do bulk supply of products at special prices to institutions such as schools, restaurants and corporates. Please contact as at corporate@sbuyer.com to know more.',
            'order'=>'3',
              'status'=>'Active',
            ]);
        faq::create([
            	'question'=>'How will I get my money back in case of a cancellation or return? What are the modes of refund?',
            'answer'=>'The amount will be refunded to your sbuyer.com account to use as store credit in your forthcoming purchases. In case of credit card payments we can also credit the money back to your credit card. Please contact customer support for any further assistance regarding this issue.',
            'order'=>'4',
              'status'=>'Active',
            ]);
        faq::create([
            	'question'=>'What do I do if an item is defective (broken, leaking, expired)?',
            'answer'=>'We have a no questions asked return policy. In case you are not satisfied with a product received you can return it to the delivery personnel at time of delivery or you can contact our customer support team and we will do the needful.',
            'order'=>'5',
              'status'=>'Active',
            ]);
    }
    
}
