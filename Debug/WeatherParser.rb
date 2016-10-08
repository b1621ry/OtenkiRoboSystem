##
require 'rexml/document'
require 'pp'
require 'active_support'
require 'active_support/core_ext'
require 'sanitize'


#天気結果格納用の配列
forcasts = []
link = nil
r = /http://[a-zA-Z0-9].xml/
#log.txtからxmlへのlinkを取得
File.open('../OtenkiGet/log.txt', 'r:utf-8') do |f|
  f.each_line do |line|
    if line.include?('<link href=')
      r.match(line)
      link = line
    end
  end
end
#xmlのリンクにアクセス

p link
#ファイルの読み込み
File.open('../OtenkiGet/log.txt', 'r:utf-8') do |f|
  f.each_line do |line|
    #pp line
    if line.include?('<jmx_eb:Weather refID="5" type="天気">')
      forcasts.push(Sanitize.clean(line))
    end
  end
end
#<jmx_eb:Weather refID="5" type="天気">
#p forcasts
# =>["くもり\n", "くもり\n"]

#以下は必要があれば。
# XMLファイル読み込み
#doc = REXML::Document.new(File.new("sampledata.xml"))
#Hashに変換
#hash = Hash.from_xml(doc.to_s)
