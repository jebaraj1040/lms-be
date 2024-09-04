<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\Course;
use App\Models\MailTemplate;
use Image;
use Mail;

class Helper
{
    public static function mailStore($template_arr)
    {
        $template_name = $template_arr['template_name'];
        $mail_content = $template_arr['mail_content'];
        $mail_status = $template_arr['mail_status'];
        $store_template = [
            'template_name' => $template_name,
            'mail_content' => $mail_content,
            'mail_status' => $mail_status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $template_create = MailTemplate::insert($store_template);

        return $template_create;
    }

    public static function mailEdit(string $id)
    {
        $template_edit = MailTemplate::where('id', '=', $id)->first();

        return $template_edit;
    }

    public static function resize($path, $image, $width, $height)
    {
        $destinationPath = public_path($path.'/'.$image);
        $resize_image = Image::make($destinationPath);
        $image_name = $width.'x'.$height.'-'.basename($image);
        $imageurl = $resize_image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$image_name);

        return $imageurl;
    }

    public static function sendUserMail($to_email, $cc, $subject, $content)
    {
        $data = ['to_email' => $to_email, 'subject' => $subject, 'content' => $content, 'cc' => $cc];
        Mail::send([], $data, function ($message) use ($data) {
            $message->to($data['to_email'])
                ->subject($data['subject'])
                ->setBody($data['content'], 'text/html');
            if (! empty($data['cc'])) {
                $message->cc($data['cc']);
            }
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });
    }

    public static function getCategories(array $data = [])
    {
        $data = Category::where($data)->get();

        return $data;
    }

    public static function getCourses(array $data = [])
    {
        $data = Course::where($data)->get();

        return $data;
    }
}
