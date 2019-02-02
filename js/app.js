  const ratio = .1
  const options = { root:null, rootMargin:'0px', threshold:ratio }
  const toobserve = function(entries,observer) { entries.forEach(function(entry) {
     if (entry.intersectionRatio > ratio) {
        entry.target.classList.add('reveal-visible');
      }else{ entry.target.classList.remove('reveal-visible') ;
    } });
     }
 const observer = new IntersectionObserver(toobserve,options)
 document.querySelectorAll('.reveal').forEach(function(r) { observer.observe(r) })
