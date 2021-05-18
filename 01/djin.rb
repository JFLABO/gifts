# coding: cp932
#ファイルの一覧を解析するアプリケーション
#base64でエンコードして出力する。
#出力：djindata.jsonはbase64エンコードされたJSONファイルである

require 'json'
require "base64"
#設定
$base_path="***your_data_folder***"

#base64ファイルのでコード　スイッチ付き
def decode_base64(sw)
  readfile()
  hash=JSON.parse $s
  list=[]
  #decoded = Base64.decode64(hash)
  hash["url"].each{|str|
    list.push( Base64.decode64(str))
  }
  ##p $s
  file_save(list)
end
def file_save(a)
	File.open("sample2.txt", "w") do |f|
		a.each { |s| f.puts(s) }
	end
end
#ファイルを読み込む
def readfile	
  File.open("djin_reports.json", mode = "rt"){|f|
    f.each_line{|line|
      $s=line
      #p line
    }
  }
end
#ディレクトリを探す(EXCEL)
def search_files()
  xlsx=[]
  c=0
  Dir.glob($base_path+'/*.xlsx').each do |fn|
    #puts fn
    fn   = Base64.encode64(fn) 
    xlsx.push(fn)
    c=c+1
  end
  #puts c.to_s + "個のxlsxファイルがありました。"
  puts c.to_s + " xlsx num (counts)"
  $hs["xlsx"]=xlsx
end
#ディレクトリを探す(URL)
def search_links()
  url=[]
  c=0
  Dir.glob($base_path+'/*.url').each do |fn|
    #puts fn
    fn   = Base64.encode64(fn)
    url.push(fn)
    c=c+1
  end
  puts c.to_s + " url num (counts)"
  $hs["url"]=url

end
#ディレクトリを探す(PDF)
def search_pdfs()
  pdf=[]
  c=0
  Dir.glob($base_path+'/*.pdf').each do |fn|
    #puts fn
    fn   = Base64.encode64(fn)
    pdf.push(fn)
    c=c+1
  end
  puts c.to_s + " url num (counts)"
  $hs["pdf"]=pdf

end

#ファイルを移動し計算する
def calc()

end
#ファイルを移動する
#k keywordファイル名に含む場合に移動
def move_files(k)
end

#データを分析する
def analyze
  d="2021/05/18 10:40:05"
  get_date(d)
end

#日付行を検知する　データをハッシュに格納する
def get_date(d)
  #d="2021/05/18 10:40:05"
  #pattern = '[12]\d{3}[/\-年](0?[1-9]|1[0-2])[/\-月](0?[1-9]|[12][0-9]|3[01])日?$'
  #pattern="/^\d{4}/\d{2}/\d{2}$/"
  pattern="^(\d{4})/(0[1-9]|1[0-2])/(0[1-9]|[12][0-9]|3[01])$"
  #r=d.match(pattern)
  r=d.match(/\d{4}\/\d{2}\/\d{2}/)
  #r="test"
  puts r
end

#アトリビュートを検知する　ハッシュに格納
def get_attr
end

#ハッシュを生成する
def make_hash_data
end

#日付を追加
def add_data_toHash01
end

#文章を追加
def add_data_toHash02
end

#アトリビュートを追加
def add_data_toHash03
end

#JSONを書き込む
def write_json
  a = {"huga"=>{"gu"=>"a", "content"=>{"valid"=>false, "num"=>1}}}
  b =  JSON.parse(a.to_json)
  File.open("djin_reports.json", "w") do |f|
    JSON.dump($hs, f)
  end
end

def switch
  p '1)excel 2)links 3)pdfs 5)[exit]'
  input = gets 
  #p input
  input=input.to_i
  case input
  when 1 then
    p "1:excel list"
	decode_base64(1)
  when 2 then
    p "2:link:list"
    decode_base64(2)
  when 3 then
    p "3:pdf list"
	decode_base64(3)
  when 5 then
    exit
  end
  switch()
end

#メイン処理開始
def main
  #analyze()
  #write_json()
  search_files()
  search_links()
  search_pdfs()
  write_json()
  switch()
end

#メインプログラム起動
#初期化
$hs={}
$s=""
#実行　メインプログラム起動/////////////////
main
#////////////////////////////////////////
