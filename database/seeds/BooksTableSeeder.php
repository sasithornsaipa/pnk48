<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $book1 = \App\Book::create([
                'name' => 'Writing Paragraphs',
                'isbn' => '9780230415935',
                'barcode' => '9780230415935',
                'author' => 'Dorothy E. Zemach',
                'description' => "Writing Paragraphs takes students from sentence formation
                                  to paragraph writing through a process approach. This not
                                  only develops students' paragraph writing skills, but also
                                  encourages them to become independent and creative writers.
                                  The back of the Student's Book contains peer review forms
                                  and a grammar reference section."
              ]);
      $book2 = \App\Book::create([
                'name' => 'Writing Sentences',
                'isbn' => '9780230415911',
                'barcode' => '9780230415911',
                'author' => 'Dorothy E. Zemach',
                'description' => "Writing Sentences introduces students to the most common
                                  and useful structures in basic written English. Each unit
                                  introduces relevant vocabulary and culminates with a writing
                                  activity that takes students through the steps of the writing
                                  process: brainstorming, arranging ideas, writing a short text,
                                  sharing the finished product with classmates."
              ]);
      $book3 = \App\Book::create([
                'name' => 'Writing Research',
                'isbn' => '9780230421943',
                'barcode' => '9780230421943',
                'author' => 'Dorothy E. Zemach',
                'description' => "Writing Research Papers is a new title in the successful
                                  Macmillan Writing Series. It introduces students to academic
                                  writing and shows them how to research an academic essay,
                                  cite references and put a paper together."
              ]);
      $book4 = \App\Book::create([
                'name' => 'ป้อนคู่สู่ขวัญ',
                'isbn' => '9786160619825',
                'barcode' => '',
                'author' => 'คริสโซเพรส',
                'description' => "แม้จะเป็นกามเทพสาวที่ช่วยให้คู่รักนับร้อยๆ คู่ได้พบรักและสมหวังในรักกันถ้วนหน้า
                                  แต่ตัว ‘คุ้มขวัญ’ เจ้าของบริษัทจัดหาคู่เองกลับโสดสนิท แถมยังหวงความโสดยิ่งชีพ
                                  ชนิดที่ขัดกับอาชีพการงานที่เธอรักและภูมิใจสุดๆ
                                  แล้วมันอะไรกัน ทำไม ‘ทริปจับคู่ในฝัน’ ที่เธอหมายมั่นปั้นมือจะจัดให้ออกมาเพอร์เฟ็กต
                                  ์ระบือลือลั่น กลับกลายเป็นทริปวุ่นวายยิ่งกว่านรกแตกไปได้ ก็แค่ผู้ร่วมทริปมีทั้งอีตาไฮโซ
                                  หนุ่มที่ออกปากว่าจะตะลุยจีบเธอทุกวิถีทาง ดาราสาวที่เป็นข่าวกับเขา พิธีกรคนสวยที่เห็น
                                  เธอเป็นศัตรู แล้วไหนจะยังคู่รักกำมะลอที่ทั้งเธอและอีตาไฮโซนั่นหามาทับถมกันอีกล่ะ
                                  บวกกับผู้ร่วมทริปที่เหลือซึ่งก็แทบจะไม่มีคู่ไหนเลยที่นับว่าเป็น ‘คู่รักปกติ’ได้ โอยยย
                                  ยุ่งโยงใยอีนุงตุงนังขนาดนี้ ทริปนี้มันจะจบลงยังไงล่ะเนี่ย!"
              ]);
      $book5 = \App\Book::create([
                'name' => 'เทวทูตแห่งโลกมืด อิจิโนเสะ กุเร็นกับวิกฤตการณ์แห่งวัยสิบหก เล่ม1',
                'isbn' => '9786163693839',
                'barcode' => '',
                'author' => 'Takaya Kagami',
                'description' => "ฤดูใบไม้ผลิสุดท้าย ก่อนที่โลกจะล่มสลายและตกอยู่ภายใต้การปกครองของแวมไพร์ อจิโนเสะ กุเรน
                                  เข้าศึกษาในโรงเรียนฝึกอบรมผู้ใช้อาคมซึ่งตั้งอยู่ที่ชิบุยะด้วยวัย15 ปี นักเรียนของที่นั่นมีแต่ทายาท
                                  ระดับหัวกะทิของตระกูลที่มีชื่อเสียงในวงการวิชาอาคม กุเรนเกิดมาในตระกุลสาขาที่มีสถานภาพต่ำต้อย
                                  เขาอาศัยอยู่ในโรงเรียนนั้น โดยถูกเยาะเย้ยว่าเป็นเศษสวะ แต่ภายในใจกลับเต็มไปด้วยความทะเยอะทะยาน
                                  อันยิ่งใหญ่ ท่ามกลางสภาพเหล่านั้น เพื่อนร่วมห้องซึ่งอบกว่าเป็นคู่หมั้นของเด็กสาวซึ่งเคยแลกเปลี่ยนสัญญา
                                  กับเขาในอดีตอันไกลโพ้นก็ปรากฏตัวขึ้น บนโลกที่กำลังดำเนินสู่การล่มสลาย เด็กหนุ่มต้องการพลัง
                                  เด็กสาวก็ต้องการพลังเช่นกัน"
              ]);

    }
}
